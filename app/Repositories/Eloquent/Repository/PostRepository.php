<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class PostRepository extends BaseRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function search()
    {
        return QueryBuilder::for($this->model)
            ->allowedFilters(['description', 'condition', 'title']);
    }

    /**
     * @inheritDoc
     */
    public function create(array $payload): ?Model
    {
        $data = (object)$payload;
        $category_id = Category::where('slug', $data->category)->first()->id;
        $user_id = auth('api')->id();
        $model = DB::transaction(function () use ($user_id, $category_id, $data) {
            $model = $this->model->create([
                'user_id' => $user_id,
                'category_id' => $category_id,
                'description' => $data->description,
                'condition' => $data->condition ?? null,
                'shoot_able' => (bool)$data->shoot_able,
                'portfolio_link' => $data->portfolio ?? null,
                'wishlist' => $data->wishlist ?? [],
            ]);
            foreach (request()->images as $image){
                $model->addMedia($image)->toMediaCollection('posts', 'post');
            }
            return $model;
        });
        return $model->fresh();
    }
}
