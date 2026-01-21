<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;
// CRITICAL: This import must be here
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $modules = Module::with(['lessons' => function ($query) use ($userId) {
            $query->orderBy('id')->withExists(['users as is_completed' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }]);
        }])->orderBy('order_sequence')->get();

        $modules->transform(function ($module) {
            $total = $module->lessons->count();
            $completed = $module->lessons->where('is_completed', true)->count();
            $module->progress = $total > 0 ? round(($completed / $total) * 100) : 0;
            $module->completed_count = $completed;
            return $module;
        });

        $activeLesson = null;
        if ($request->has('lesson')) {
            $activeLesson = Lesson::withExists(['users as is_completed' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }])->find($request->input('lesson'));
        }

        return Inertia::render('Lessons/Index', [
            'modules' => $modules,
            'activeLesson' => $activeLesson,
        ]);
    }

    /**
     * Handles the "Mark Complete" action.
     */
    public function complete(Lesson $lesson)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // 1. Mark current lesson as complete
        $user->lessons()->syncWithoutDetaching([$lesson->id]);

        // 2. CHECK: Did they finish the whole module?
        $module = $lesson->module;
        $totalLessons = $module->lessons()->count();
        // Count how many lessons in THIS module the user has finished
        $completedCount = $user->lessons()
            ->where('module_id', $module->id)
            ->count();

        // 3. Prepare the Celebration Trigger
        if ($completedCount >= $totalLessons) {
            // MAGIC KEY: We send 'module_completed' to Vue
            return back()->with('module_completed', $module->title);
        }

        // Just a normal lesson finish
        return back()->with('lesson_completed', true);
    }
}
