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
        return $this->belongsToMany(Ability::class, 'ability_role')->withTimeStamps();
    }

    public function allowTo($ability)
    {
        $this->abilities()->sync($ability);
    }

    public function users()
    {
        return $this->belongsTo(RoleUser::class);
    }
}
