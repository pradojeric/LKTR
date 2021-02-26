<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventQuestion extends Model
{
    //

    protected $guarded = [];

    protected $fillable = [
        'event_category_id', 'question_text', 'enabled', 'time'
    ];

    /**
     * Get the eventCategory that owns the EventQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public function eventAnswers()
    {
        return $this->hasMany(EventAnswer::class);
    }
}
