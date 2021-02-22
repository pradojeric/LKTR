<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Answers extends JsonResource
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
            'question_id' => $this->question_id,
            'choice_text' => $this->choice_text,
            'correct' => $this->correct,
        ];
    }
}
