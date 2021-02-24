<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'question_id', 'choice_text', 'correct'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
