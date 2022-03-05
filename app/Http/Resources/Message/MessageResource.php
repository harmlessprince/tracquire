<?php

namespace App\Http\Resources\Message;

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
                'sender' => $this->sender,
                'receiver' => $this->receiver,
                'message' => $this->message,
                'read' => (bool) $this->read,
                'read_at' => $this->read_at,
                'created_at' => format_date($this->created_at),
                'updated_at' => format_date($this->updated_at),
            ],
            'relationships' => [
                'sender' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->from])
                    ]
                ],
                'receiver' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->to])
                    ]
                ],
            ],
        ];
    }
}
