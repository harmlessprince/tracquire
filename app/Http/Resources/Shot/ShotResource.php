<?php

namespace App\Http\Resources\Shot;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\User\UserResource;
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
                'title' => $this->title,
                'description' => $this->description,
                'condition' => $this->condition,
                'created_at' => format_date($this->created_at ?? Carbon::now()),
                'updated_at' => format_date($this->updated_at  ?? Carbon::now()),
                'images' => $this->fetchAllMedia()
            ],
            'relationships' => [
                'post' => [
                    'links' => [
                        'related' => route('posts.show', ['post' => $this->post_id ?? 0])
                    ]
                ],
                'shooter' => [
                    'links' => [
                         'related' => route('users.show', ['user' => $this->user_id ?? 0])
                    ]
                ],
            ],
            "included" => [
                'shooter' => new UserResource($this->shooter),
                'post' => new PostResource($this->post),
            ]
        ];
    }
}
