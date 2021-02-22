<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'description', 'abbreviation', 'free',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function teacherUser()
    {
        return $this->hasMany('App\CourseUser');
    }

    public function leaderboards()
    {
        return $this->hasMany('App\Leaderboards');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimeStamps();
    }
}
