<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLeaderboard extends Model
{
    //
    protected $guarded = [];

    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class);
    }

    public function eventUser()
    {
        return $this->belongsTo(EventUser::class, 'event_users_id');
    }
}
