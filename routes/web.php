<?php

use App\Http\Controllers\FreedomWallController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScenarioController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Landing Page
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Protected Student Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. DASHBOARD
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // 2. PROFILE (Standard Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. FREEDOM WALL
    Route::get('/freedom-wall', [FreedomWallController::class, 'index'])->name('freedom-wall');
    Route::post('/freedom-wall', [FreedomWallController::class, 'store'])->name('freedom-wall.store');

    // 4. SCENARIOS (The Game)
    Route::get('/scenarios', [ScenarioController::class, 'index'])->name('scenarios');
    Route::get('/scenarios/{id}', [ScenarioController::class, 'show'])->name('scenarios.show');

    // 5. LESSONS (The Reader)
    // Now pointing to the Controller instead of a placeholder
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons');
    Route::post('/lessons/{lesson}/complete', [LessonController::class, 'complete'])->name('lessons.complete');
});

require __DIR__ . '/auth.php';
