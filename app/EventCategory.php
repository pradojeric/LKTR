<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    //
    protected $fillable = [
        'category'
    ];

    /**
     * Get the gameEvent that owns the EventCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gameEvent()
    {
        return $this->belongsTo(GameEvent::class);
    }

    public function eventQuestions()
    {
        return $this->hasMany(EventQuestion::class);
    }
}
