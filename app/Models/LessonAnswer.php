<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',      // <--- Added this
        'lesson_id',    // <--- Added this
        'field_index',  // <--- Added this
        'answer_text',  // <--- Added this
    ];

    /**
     * Get the user that owns the answer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the lesson that owns the answer.
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
