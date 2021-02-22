<?php

namespace App\Http\Resources;

use App\Http\Resources\ElektroUsers as ElektroUsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Leaderboards extends JsonResource
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
            'course_id' => $this->course_id,
            'score' => $this->score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'elektro_user_name' => $this->elektroUser->username,
            'elektro_user_school' => $this->elektroUser->school,
            
        ];
    }
}
