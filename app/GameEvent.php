<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameEvent extends Model
{
    //
    protected $guarded = [];

    /**
     * Get all of the comments for the GameEvent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventUsers(): HasMany
    {
        return $this->hasMany(EventUser::class);
    }
}
