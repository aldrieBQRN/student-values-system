<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            // UPDATE THIS SECTION
            'flash' => [
                'message' => fn() => $request->session()->get('message'),
                'lesson_completed' => fn() => $request->session()->get('lesson_completed'),
                'module_completed' => fn() => $request->session()->get('module_completed'),
                'module_summary' => fn() => $request->session()->get('module_summary'), // <--- Critical for the summary modal
            ],
        ];
    }
}
