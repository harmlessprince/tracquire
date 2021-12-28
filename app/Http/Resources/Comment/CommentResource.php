<?php

namespace App\Http\Resources\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => (string) $this->id,
            'type' => 'comments',
            'attributes' => [
                'body' => $this->body,
                'created_by' => $this->author->first_name ?? 'N/A',
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
