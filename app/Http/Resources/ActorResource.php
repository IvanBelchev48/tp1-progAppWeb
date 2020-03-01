<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActorResource extends JsonResource
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
            'Last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'birthdate' => $this->birthdate,
            'created_at' => $this->created_at,
        ];

        //return parent::toArray($request);
    }
}
