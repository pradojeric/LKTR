<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    //
    protected $table = 'course_user';

    protected $fillable = [
        'course_id', 'user_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
