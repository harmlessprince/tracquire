<?php

namespace App\Http\Resources\Shot;

use Carbon\Carbon;
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
                'created_at' => format_date($this->created_at ?? Carbon::now()),
                'updated_at' => format_date($this->updated_at  ?? Carbon::now()),
                'images' => $this->getMedia('shots')->pluck('original_url')
            ],
            'relationships' => [
                'post' => [
                    'links' => [
                        'related' => route('posts.show', ['post' => $this->post_id ?? 0])
                    ]
                ],
                'shooter' => [
                    'links' => [
                        // 'related' => route('users.show', ['user' => $this->user_id ?? 0])
                    ]
                ],
            ],
        ];
    }
}
