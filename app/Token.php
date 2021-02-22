<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    //
    protected $fillable = ['user_id', 'personal_access_token_id', 'token'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
