<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'full_name' => $this->full_name,
            'slug' => $this->slug,
            'victim_name' => $this->victim_name,
            'description' => $this->description,
            'victim_image' => $this->victim_image,
            'case_image' => json_decode($this->case_image), 
        'case_video' => json_decode($this->case_video), 
        'case_file' => json_decode($this->case_file), 
        'created_at' => $this->created_at->diffForHumans(),
           
        ];
    }
}
