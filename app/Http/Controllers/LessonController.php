<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Lesson;
use App\Models\LessonAnswer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Fetch Modules with Progress
        $modules = Module::with(['lessons' => function ($query) use ($userId) {
            $query->orderBy('id')->withExists(['users as is_completed' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }]);
        }])->orderBy('order_sequence')->get();

        // Calculate Progress %
        $modules->transform(function ($module) {
            $total = $module->lessons->count();
            $completed = $module->lessons->where('is_completed', true)->count();
            $module->progress = $total > 0 ? round(($completed / $total) * 100) : 0;
            $module->completed_count = $completed;
            return $module;
        });

        $activeLesson = null;
        $userAnswers = [];

        if ($request->has('lesson')) {
            $activeLesson = Lesson::withExists(['users as is_completed' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }])->find($request->input('lesson'));

            // Fetch Saved Answers
            if ($activeLesson) {
                $userAnswers = LessonAnswer::where('user_id', $userId)
                    ->where('lesson_id', $activeLesson->id)
                    ->pluck('answer_text', 'field_index');
            }
        }

        return Inertia::render('Lessons/Index', [
            'modules' => $modules,
            'activeLesson' => $activeLesson,
            'savedAnswers' => $userAnswers,
        ]);
    }

    public function complete(Request $request, Lesson $lesson)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // 1. ALWAYS SAVE ANSWERS (Even if incomplete)
        if ($request->has('answers')) {
            foreach ($request->answers as $index => $text) {
                LessonAnswer::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'lesson_id' => $lesson->id,
                        'field_index' => $index
                    ],
                    ['answer_text' => $text]
                );
            }
        }

        // 2. AUTO-SAVE HANDLER (Navigation only)
        if ($request->boolean('save_only')) {
            return back();
        }

        // --- NEW LOGIC: PREVENT COMPLETION IF PREREQUISITES MISSING ---
        $module = $lesson->module;

        // Get all lessons for this module to determine order/last
        $allLessons = $module->lessons()->orderBy('id')->get();
        $lastLesson = $allLessons->last();

        // IS THIS THE LAST LESSON?
        if ($lesson->id === $lastLesson->id) {

            // Count how many OTHER lessons in this module are done
            $completedOthersCount = $user->lessons()
                ->where('module_id', $module->id)
                ->where('lesson_id', '!=', $lesson->id) // Exclude current
                ->count();

            // Total lessons excluding current
            $requiredOthersCount = $allLessons->count() - 1;

            // IF PREVIOUS LESSONS ARE INCOMPLETE
            if ($completedOthersCount < $requiredOthersCount) {

                // Build Summary List
                $completedIds = $user->lessons()
                    ->where('module_id', $module->id)
                    ->pluck('lessons.id')
                    ->toArray();

                $summaryList = $allLessons->map(function ($l) use ($completedIds) {
                    return [
                        'id' => $l->id,
                        'title' => $l->title,
                        'is_completed' => in_array($l->id, $completedIds),
                    ];
                });

                // STOP HERE: Do NOT mark as complete. Return Summary.
                return back()->with('module_summary', [
                    'module_title' => $module->title,
                    'lessons' => $summaryList
                ]);
            }
        }

        // 3. Mark current lesson as complete
        // (We only reach here if it's NOT the last lesson, OR it IS the last lesson and others are done)
        $user->lessons()->syncWithoutDetaching([$lesson->id]);

        // 4. CHECK FOR FULL MODULE COMPLETION (For Celebration)
        $totalCompleted = $user->lessons()->where('module_id', $module->id)->count();

        if ($totalCompleted >= $allLessons->count()) {
            return back()->with('module_completed', $module->title);
        }

        return back()->with('lesson_completed', true);
    }
}
