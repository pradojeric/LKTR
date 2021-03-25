<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLeaderboard extends Model
{
    //
    protected $guarded = [];

    public function getUpdatedDateAttribute()
    {
        return date('m d, Y h:i a', strtotime($this->updated_at));
    }


    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class, 'game_event_id');
    }

    public function eventUser()
    {
        return $this->belongsTo(EventUser::class, 'event_users_id');
    }
}
