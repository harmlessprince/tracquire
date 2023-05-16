<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $conversation = $this->resource;
        $last_message = $conversation->last_message;
        return [
            'id' => (string) $conversation->id,
            'type' => 'conversations',
            'attributes' => [
                'id' => $conversation->id,
                'private' => $conversation->private,
                'data' => $conversation->data,
                'created_at' => $conversation->created_at,
                'updated_at' => $conversation->updated_at,
            ],
            'included' => [
                'participants' => new UserCollection($conversation->getParticipants()),
                'last_message' => [
                    'id' => $last_message->id,
                    'message_id' => $last_message->message_id,
                    'conversation_id' => $last_message->conversation_id,
                    'participation_id' => $last_message->participation_id,
                    "is_seen" => $last_message->is_seen,
                    "is_sender" => $last_message->is_sender,
                    "body" => $last_message->body,
                    "type" => $last_message->type,
                    "data" => $last_message->data,
                    "sender" => new UserResource($last_message->sender),
                ],
            ],
            'relationships' => [
                // 'messages' 
            ],
        ];
    }
}
