<?php

namespace App\Http\Resources;

use App\Http\Resources\SubjectLessons as SubjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseSubjects extends JsonResource
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
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'slug' => $this->slug,
            'subjects' => SubjectResource::collection($this->subjects)
        ];
    }
}
