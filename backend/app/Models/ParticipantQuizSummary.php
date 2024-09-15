<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantQuizSummary extends Model
{
    use HasFactory;

    protected $table = 'participant_quiz_summaries';

    protected $fillable = [
        'participant_id',
        'quiz_id',
        'score',
        'completed_at'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
