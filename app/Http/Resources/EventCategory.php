<?php

namespace App\Http\Resources;

use App\Http\Resources\EventQuestion as EventQuestionResources;
use Illuminate\Http\Resources\Json\JsonResource;

class EventCategory extends JsonResource
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
            'game_event_id' => $this->category,
            'event_questions' => EventQuestionResources::collection($this->eventQuestions),
        ];
    }
}
