<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'users',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'user_name' => $this->username,
                'phone' => $this->phone,
                'email' => $this->email,
                'user_type' => $this->user_type,
                'country' => $this->country,
                'state' => $this->state,
                'city'  => $this->city,
            ],
            'relationships' => [
                'posts' => [
                    'links' => [
                        'related' => route('users.posts', ['user' => $this->id])
                    ]
                ],
                'comments' => [
                    'links' => [
                        'related' => route('users.comments', ['user' => $this->id])
                    ]
                ],
                'shots' => [
                    'links' => [
                        'related' => route('users.shots', ['user' => $this->id])
                    ]
                ],
                'transactions' => [
                    'links' => [
                        'related' => route('users.transactions', ['user' => $this->id])
                    ]
                ],
            ],
        ];
    }
}
