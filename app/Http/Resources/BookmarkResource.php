<?php

namespace App\Http\Resources;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
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
            'id' => (string) $this->id,
            'type' => 'bookmarks',
            'relationships' => [
                'post' => [
                    'links' => [
                        'related' => route('posts.comments', ['post' => $this->post_id ?? 0])
                    ]
                ],
                'author' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->user_id ?? 0])
                    ]
                ],
            ],
            'included' => [
                'post' => $this->whenLoaded('post', fn () => new PostResource($this->post->load('category', 'user')->loadCount('comments'))),
            ],
        ];
    }
}
