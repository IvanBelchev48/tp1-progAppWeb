<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CriticResource extends JsonResource
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
            'Film_id' => $this->film_id,
            'User_id' => $this->user_id,
            'Score' => $this->score,
            'Comment' => $this->comment,
        ];
        //return parent::toArray($request);
    }
}
