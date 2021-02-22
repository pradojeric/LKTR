<?php

namespace App\Http\Resources;

use App\Http\Resources\Questions as QuestionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonQuestions extends JsonResource
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
            'subject_id' => $this->subject_id,
            'name' => $this->name,
            'questions' => QuestionResource::collection($this->questions),
        ];
    }
}
