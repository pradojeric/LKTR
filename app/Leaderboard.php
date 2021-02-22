<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    //
    protected $fillable = [
        'course_id', 'elektro_user_id', 'score'
    ];

    public function courses()
    {
        return $this->belongsTo('App\Courses');
    }

    public function elektroUser()
    {
        return $this->belongsTo('App\ElektroUser', 'elektro_user_id');
    }
}
