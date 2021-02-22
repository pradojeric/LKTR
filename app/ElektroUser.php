<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElektroUser extends Model
{
    //
    protected $table = "elektro_users";

    protected $fillable = [
        'username', 'school'
    ];

    public function leaderboards()
    {
        return $this->hasMany('App\Leaderboard', 'elektro_user_id');
    }
}
