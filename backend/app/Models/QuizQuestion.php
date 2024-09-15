<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $table = 'quiz_questions';

    protected $fillable = [
        'question_type_id',
        'question_text',
        'question_image'
    ];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }

    public function quizLinks()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_question_links');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'question_id');
    }

    public function participantAnswers()
    {
        return $this->hasMany(ParticipantAnswer::class);
    }
}