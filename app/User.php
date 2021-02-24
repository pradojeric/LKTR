<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; //added

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'middle_name', 'contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = \ucfirst($value);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = \ucfirst($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = \ucfirst($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_name}";
    }

    public function isAdmin()
    {
        if(optional($this->role)->id == 1)
            return true;
        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }

    public function assignTo($role)
    {
        $this->roles()->sync($role);
    }

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('ability')->unique();
    }

    public function courses(){
        return $this->belongsToMany(Course::class)->withTimeStamps();
    }

    public function coursesAllowed($courses)
    {
        $this->courses()->sync($courses);
    }

    public function plainTextTokens()
    {
        return $this->hasMany(Token::class);
    }

    public function version()
    {
        return $this->hasOne(Version::class);
    }
}
