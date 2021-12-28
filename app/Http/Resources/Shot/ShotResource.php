<?php

namespace App\Http\Resources\Shot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request) :array
    {
        return [
            'id' => (string) $this->id,
            'type' => 'shots',
            'attributes' => [
//                'shooter' => $this->shooter->full_name ?? null,
//                'post' => $this->post,
                'description' => $this->description,
                'condition' => $this->condition,
                'created_at' => format_date($this->created_at),
                'updated_at' => format_date($this->updated_at),
                'images' => $this->getMedia('shots')->pluck('original_url')
            ],
            'relationships' => [
                'post' => [
                    'links' => [
                        'related' => route('posts.show', ['post' => $this->post_id])
                    ]
                ],
                'shooter' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->user_id])
                    ]
                ],
            ],
        ];
    }
}
