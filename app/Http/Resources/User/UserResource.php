<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'users',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'phone' => $this->phone,
                'email' => $this->email,
                'referrer_token' => $this->referrer_token,
                'user_type' => $this->user_type,
                'country' => $this->country,
                'state' => $this->state,
                'city'  => $this->city,
                'avatar' =>  $this->getFirstMediaUrl('avatar'),
                'no_of_posts' => $this->posts_count,
                'no_of_bookmarks' => $this->bookmarks_count,
                'earnings' => $this->balance
            ],
            'relationships' => [
                'posts' => [
                    'links' => [
                        'related' => route('users.posts', ['user' => $this->id ?? 0])
                    ]
                ],
                'comments' => [
                    'links' => [
                        'related' => route('users.comments', ['user' => $this->id ?? 0])
                    ]
                ],
                'shots' => [
                    'links' => [
                        'related' => route('users.shots', ['user' => $this->id ?? 0])
                    ]
                ],
                'transactions' => [
                    'links' => [
                        'related' => route('users.transactions', ['user' => $this->id ?? 0])
                    ]
                ],
            ],
            'included' => [
                'posts' => PostResource::collection($this->whenLoaded('posts')),
                'bookmarks' => PostResource::collection($this->whenLoaded('bookmarks')),
            ]
        ];
    }
}
