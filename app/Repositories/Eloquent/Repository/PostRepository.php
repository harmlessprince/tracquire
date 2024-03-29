<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
                'title' => $data->title ?? null,
                'shoot_able' => (bool)$data->shoot_able,
                'portfolio_link' => $data->portfolio ?? null,
                'wishlist' => $data->wishlist ?? [],
                'location' => $data->location ?? '',
                'published_at' => $data->publish == "yes" ? now() : null,
            ]);

            if (property_exists($data, 'images')) {
                // $imageUrls = [];
                foreach ($data->images as $image) {
                    $model->attachMedia($image);
                }
                // foreach ($imageUrls as $imageUrl) {
                //     $model->addMedia($imageUrl)->toMediaCollection('posts', 'post');
                // }
            }
            return $model;
        });
        return $model->fresh();
    }

    /**
     * @inheritDoc
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->latest('created_at')->with($relations)->withCount(['comments', 'shots'])->get($columns);
    }
}
