<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Wallet;
class WalletRepository extends BaseRepository
{
    public function __construct(Wallet $model)
    {
        parent::__construct($model);
    }

}

