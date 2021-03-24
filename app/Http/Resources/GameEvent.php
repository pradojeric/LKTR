<?php

namespace App\Http\Resources;

use App\Http\Resources\EventCategory as EventCategoryResources;
use Illuminate\Http\Resources\Json\JsonResource;

class GameEvent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'event_name' => $this->name,
            'description' => $this->description,
            'starting_time' => $this->starting_event,
            'ending_time' => $this->ending_event,
            'event_category' => EventCategoryResources::collection($this->eventCategories),
        ];
    }
}
