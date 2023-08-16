<?php

namespace App\Http\Resources\V1;

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
            'website_id ' => $this->website_id ,
            'title' => $this->title,
            'description' => $this->body,
            'created_at' => $this->created_at,
            'user_id' => $this->user_id,
        ];
    }
}