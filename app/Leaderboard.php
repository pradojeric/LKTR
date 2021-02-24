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
        return $this->belongsTo(Course::class);
    }

    public function elektroUser()
    {
        return $this->belongsTo(ElektroUser::class, 'elektro_user_id');
    }
}
