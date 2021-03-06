<?php

namespace App\Http\Resources\Message;

use App\Http\Resources\ConversationResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'messages',
            'attributes' => [
                'message' => $this->message,
                'read_at' => $this->read_at,
                'created_at' => format_date($this->created_at),
                'updated_at' => format_date($this->updated_at),
            ],
            'included' => [
                'sender' => new UserResource($this->sender),
                'conversation' => new ConversationResource($this->conversation),
            ],
            'relationships' => [
                'sender' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->sender])
                    ]
                ],
            ],
        ];
    }
}
