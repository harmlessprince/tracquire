<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Message;

class MessageRepository extends BaseRepository
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function send(array $data)
    {
        return $this->model::create([
            'from' => auth('api')->id(),
            'to' => (int)$data['receiver'],
            'message' => $data['message']
        ]);
    }

    public function latestMessages($id)
    {
        // mark all messages with the selected contact as read
        $this->model::where('from', auth('api')->id())->where('to', $id)->update(['read' => true, 'read_at' => now()]);
        // get all messages between the authenticated user and the selected user
        return $this->model::where(function ($q) use ($id) {
            $q->where('from', auth('api')->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth('api')->id());
        })->orderBy('created_at', 'ASC')->limit(10)->get();
    }


}

