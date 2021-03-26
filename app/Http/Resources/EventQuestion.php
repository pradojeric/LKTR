<?php

namespace App\Http\Resources;

use App\Http\Resources\EventAnswer as EventAnswerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EventQuestion extends JsonResource
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
            'event_category_id' => $this->event_category_id,
            'question_text' => $this->question_text,
            'time' => $this->time,
            'event_answers' => EventAnswerResource::collection($this->eventAnswers),
        ];
    }
}
