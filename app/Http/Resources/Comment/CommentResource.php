<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,
            'type' => 'comments',
            'attributes' => [
                'body' => $this->body,
                'author' => new UserResource($this->author),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'post' => [
                    'links' => [
                        'related' => route('posts.show', ['post' => $this->commentable_id])
                    ]
                ],
            ],
        ];
    }
}
