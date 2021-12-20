<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Comment\CommentsIdentifierResource;
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
            'id' => (string) $this->id,
            'type' => 'posts',
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'condition' => $this->condition,
                'shoot_able' => (bool)$this->shoot_able,
                'status'=> $this->status,
                'category' => strtoupper($this->category->name) ?? '',
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
                'location' => $this->location,
                'published_at' => $this->published_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'comments' => [
                    'links' => [
                        'related' => route('posts.comments', ['post' => $this->id])
                    ]
                ],
            ],
        ];
    }
}