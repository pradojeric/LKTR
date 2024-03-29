<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Courses extends JsonResource
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
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'slug' => $this->slug,
            'description' => $this->description,
            'free' => $this->free,
        ];
    }
}
