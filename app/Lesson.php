<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = [
        'subject_id', 'name'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = \ucfirst($value);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
