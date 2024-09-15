<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'quiz_status_id',
        'theme_id',
        'landing_page_id',
        'mechanic_page_id',
        'admin_id',
        'participant_id',
    ];

    public function quizStatus()
    {
        return $this->belongsTo(QuizStatus::class, 'quiz_status_id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class, 'landing_page_id');
    }

    public function mechanicPage()
    {
        return $this->belongsTo(MechanicPage::class, 'mechanic_page_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function quizQuestions()
    {
        return $this->belongsToMany(QuizQuestion::class, 'quiz_question_links');
    }

    public function participantQuizzes()
    {
        return $this->hasMany(ParticipantQuiz::class);
    }

    public function participantQuizSummaries()
    {
        return $this->hasMany(ParticipantQuizSummary::class);
    }
}
