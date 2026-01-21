<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Inertia\Inertia;

class ScenarioController extends Controller
{
    // List all scenarios
    public function index()
    {
        return Inertia::render('Scenarios/Index', [
            'scenarios' => Scenario::all()
        ]);
    }

    // The "Game" View
    public function show($id)
    {
        // Fetch scenario with its options
        $scenario = Scenario::with('options')->findOrFail($id);

        return Inertia::render('Scenarios/Show', [
            'scenario' => $scenario
        ]);
    }
}
