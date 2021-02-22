<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'lesson_id', 'question_text', 'justification', 'difficulty', 'time', 'enabled'
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }
}
