<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{

    public $collects = PostResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'target' => [
                'organization' => 'com.jordan',
                'author' => [
                    'name' => 'Jordan',
                    'email' => 'jordan@mail.com',
                ],
            ],
            'type' => 'post',
        ];

    }
}