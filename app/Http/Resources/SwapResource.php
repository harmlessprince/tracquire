<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class SwapResource extends JsonResource
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
            'type' => Str::plural($this->type),
            'attributes' => [
                'type' => $this->type,
                'created_at' => format_date($this->created_at),
                'updated_at' => format_date($this->updated_at),
            ],
            'included' =>[
                'owner' => new UserResource($this->whenLoaded('owner')),
                'receiver' => new UserResource($this->whenLoaded('receiver')),
            ],
            'relationships' => [
                'owner' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->owner_id])
                    ]
                ],
                'receiver' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->receiver_id])
                    ]
                ],
            ],
        ];
    }
}
