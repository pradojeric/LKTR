<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAnswer extends Model
{
    //
    protected $fillable = [
        'event_question_id', 'answer_text', 'correct'
    ];

    public function eventQuestion()
    {
        return $this->belongsTo(EventQuestion::class);
    }
}
