<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLeaderboard extends Model
{
    //
    protected $fillable = [
        'game_event_id', 'event_user_id', 'score'
    ];

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
