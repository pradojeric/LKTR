<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'course_id', 'name'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}
