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
            'film_id' => $this->film_id,
            'user_id' => $this->user_id,
            'score' => $this->score,
            'coment' => $this->comment,
        ];
        //return parent::toArray($request);
    }
}
