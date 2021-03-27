<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    //
    protected $guarded = [];

    /**
     * Get the gameEvent that owns the EventUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class);
    }

    public function userLoaderboard()
    {
        return $this->hasMany(GameEvent::class, 'event_users_id');
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
