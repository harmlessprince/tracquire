<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Post;
use Spatie\QueryBuilder\QueryBuilder;

class PostRepository extends BaseRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function  search(){
       return QueryBuilder::for($this->model)
            ->allowedFilters(['description', 'condition', 'title'])->jsonPaginate();
    }
}
