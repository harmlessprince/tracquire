<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'attributes' => [
                'message' => $this->body,
                'type' => $this->type,
                'data' => $this->data,
                'created_at' => format_date($this->created_at),
                'updated_at' => format_date($this->updated_at),
            ],
            'relationships' => [
                'sender' => new UserResource($this->sender),
            ],
        ];
    }
}
