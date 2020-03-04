<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'Titre' => $this->title,
            'Année' => $this->release_year,
            'Durée' => $this->length,
            'Description' => $this->description,
            'Note' => $this->rating,
            'Language ID' => $this->language_id,
            'Special features' => $this->special_features,
            'Image' => $this->image,
            'Created at' => $this->created_at,
        ];
    }
}
