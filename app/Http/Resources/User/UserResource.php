<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Post\PostResource;
use App\Http\Resources\SwapResource;
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
                'avatar' =>  $this->fetchLastMedia()->file_url ?? "",
                'no_of_posts' => $this->posts_count,
                'no_of_bookmarks' => $this->bookmarks_count,
                // $this->mergeWhen((bool)($this->whenLoaded('wallet')), 0),
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
                        'related' => route('swaps.show.complete', ['id' => $this->id ?? 0])
                    ]
                ],
            ],
            'meta' => [
                'posts_count' => $this->posts_count,
                'transactions_count' => $this->user_transactions_count ?? 0,
            ],
            'included' => [
                'posts' => PostResource::collection($this->whenLoaded('posts')),
                'bookmarks' => PostResource::collection($this->whenLoaded('bookmarks')),
                'transactions' => SwapResource::collection($this->whenLoaded('userTransactions')),
                'wallet' =>   $this->whenLoaded('wallet')
            ]
        ];
    }
}
