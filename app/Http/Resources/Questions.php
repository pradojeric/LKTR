<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Answers as AnswerResource;

class Questions extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lesson_id' => $this->lesson_id,
            'question_text' => $this->question_text,
            'justification' => $this->justification,
            'difficulty' => $this->difficulty,
            'time' => $this->time,
            'answers' => AnswerResource::collection($this->answers),
        ];
    }
}
