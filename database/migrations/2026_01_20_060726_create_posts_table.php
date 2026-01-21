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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Link to user for moderation, but UI treats this as "Anonymous"
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->text('content');

            // The emotional context tags
            $table->enum('mood', ['grateful', 'stressed', 'anxious', 'motivated', 'hopeful', 'tired']);

            // Simple moderation flag (hide post if flagged)
            $table->boolean('is_flagged')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
