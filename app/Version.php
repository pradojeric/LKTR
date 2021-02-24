<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    //
    protected $fillable = [
        'user_id', 'version'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
