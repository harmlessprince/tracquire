<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Message;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

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
        $this->model::where('from', auth()->id())->where('to', $id)->update(['read' => true, 'read_at' => now()]);
        // get all messages between the authenticated user and the selected user
        return $this->model::with('sender:id,username', 'receiver:id,username')->where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })->orderBy('created_at', 'ASC')->paginate();
    }

    public function chats()
    {
        return $this->model::with(['sender:id,username', 'receiver:id,username'])->whereIn('id', function (QueryBuilder $query) {
            $query->selectRaw("max(id)")
                ->from('messages')
                ->where('to', '=', auth()->id())
                ->groupBy('from');
        })->orderBy('created_at', 'desc')
            ->paginate();
    }
}
// ->select(DB::raw("SUM(CASE WHEN (`read` = 0) THEN 1 ELSE 0 END) AS danger"))
