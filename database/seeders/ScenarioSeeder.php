<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scenario;
use App\Models\ScenarioOption;

class ScenarioSeeder extends Seeder
{
    public function run(): void
    {
        $scenario = Scenario::create([
            'title' => 'The Group Project Ghost',
            'situation' => 'You are assigned a group project worth 40% of your grade. One member, Alex, has not replied to messages for two weeks. The deadline is in 3 days. You have done your part, but theirs is missing.',
            'difficulty_level' => 1,
        ]);

        ScenarioOption::create([
            'scenario_id' => $scenario->id,
            'choice_text' => 'Cover for them. Do their work yourself to ensure a good grade.',
            'consequence_text' => 'You get an A, but you feel exhausted and resentful. Alex learns that they can get away with doing nothing. You sacrificed your mental health for a grade.',
            'type' => 'passive',
        ]);

        ScenarioOption::create([
            'scenario_id' => $scenario->id,
            'choice_text' => 'Report them to the professor immediately.',
            'consequence_text' => 'The professor appreciates your honesty but asks why you waited so long. The group dynamic becomes awkward, but you stood up for fairness.',
            'type' => 'assertive',
        ]);

        ScenarioOption::create([
            'scenario_id' => $scenario->id,
            'choice_text' => 'Send one final, firm message giving them 24 hours before you report them.',
            'consequence_text' => 'Alex replies! They were overwhelmed with a family emergency. By communicating boundaries clearly but with empathy, you solved the problem and kept the relationship intact.',
            'type' => 'constructive',
        ]);
    }
}
