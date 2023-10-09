<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Comment\CommentsIdentifierResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

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
            'id' => (string) $this->id,
            'type' => 'posts',
            'attributes' => [
                // 'author' => $this->user->full_name ?? "James Bond",
                'title' => $this->title ?? "Jane",
                'description' => $this->description,
                'condition' => $this->condition,
                'wishlist' => $this->wishlist,
                'portfolio' => $this->portfolio_link,
                'shoot_able' => (bool)$this->shoot_able,
                'status' => strtoupper($this->status),
                'category' => strtoupper($this->category->name) ?? '',
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
                'location' => $this->location,
                'published_at' => $this->published_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'images' => $this->fetchAllMedia(),
            ],
            'relationships' => [
                'comments' => [
                    'links' => [
                        'related' => route('posts.comments', ['post' => $this->id ?? 0])
                    ]
                ],
                'author' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->user_id ?? 0])
                    ]
                ],
            ],
            'included' => [
                'author' => $this->whenLoaded('user', fn () => new UserResource($this->user)),
            ],
            'meta' => [
                'comments_count' => $this->comments_count,
                'shots_count' => $this->shots_count,
            ],
        ];
    }
}
