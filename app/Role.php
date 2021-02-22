<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'role'
    ];

    public function abilities()
    {
        return $this->belongsToMany('App\Ability', 'ability_role')->withTimeStamps();
    }

    public function allowTo($ability)
    {
        $this->abilities()->sync($ability);
    }

    public function users()
    {
        return $this->belongsTo('App\RoleUser');
    }
}
