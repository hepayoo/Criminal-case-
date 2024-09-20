<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CrimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'desc' => $this->desc,
            'imagePath' => $this->imagePath,
            'biography' => $this->biography,
            'murders' => $this->murders,
            'arrests' => $this->arrests,
            'sources' => $this->sources,
           
        ];
    }
}
