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
        return $this->hasMany(Subject::class);
    }

    public function teacherUser()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
}
