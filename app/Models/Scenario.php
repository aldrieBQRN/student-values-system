<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    public function options()
    {
        return $this->hasMany(ScenarioOption::class);
    }
}
