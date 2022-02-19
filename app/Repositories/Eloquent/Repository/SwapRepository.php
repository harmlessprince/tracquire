<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Swap;
class SwapRepository extends BaseRepository
{
    public function __construct(Swap $model)
    {
        parent::__construct($model);
    }
}

