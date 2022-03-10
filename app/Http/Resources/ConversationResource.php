<?php

namespace App\Http\Resources;

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
        return [
            'id' => (string) $this->id,
            'type' => 'conversations',
            'attributes' => [
                'last_message' => $this->last_msg,
                'seen' => (bool) $this->seen,
                'unseen_number' => $this->unseen_number,
            ],
            'included' => [
                'owner' => new UserResource($this->owner),
                'sender' => new UserResource($this->sender)
            ],
            'relationships' => [
                // 'messages' 
            ],
        ];
    }
}
