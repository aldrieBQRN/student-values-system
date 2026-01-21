<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scenario_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scenario_id')->constrained()->onDelete('cascade');

            $table->string('choice_text'); // e.g., "Do the work yourself"
            $table->text('consequence_text'); // e.g., "You get the grade, but feel burnt out..."

            // Visual cue for the frontend (e.g., 'constructive', 'avoidant')
            $table->string('type')->default('neutral');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenario_options');
    }
};
