<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameEvent extends Model
{

    protected $fillable = [
        'name', 'description', 'event_code', 'starting_event', 'ending_event', 'status'
    ];
    /**
     * Get all of the comments for the GameEvent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventUsers()
    {
        return $this->hasMany(EventUser::class);
    }

    public function getUsersAttribute()
    {
        return $this->eventUsers()->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get all of the eventCategories for the GameEvent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventCategories()
    {
        return $this->hasMany(EventCategory::class);
    }

    /**
     * Get all of the comments for the GameEvent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventLeaderboards()
    {
        return $this->hasMany(EventLeaderboard::class);
    }
}
