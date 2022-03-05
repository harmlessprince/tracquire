<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function creditWallet($user_id)
    {
        dd($user_id);
    }

    public function findByUserName(string $username)
    {
        return $this->model::where('username', $username)->first();
    }
}
