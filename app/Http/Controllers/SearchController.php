<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Resources\Post\PostCollection;
use App\Models\Post;
use Spatie\QueryBuilder\QueryBuilder;
/**
 * @group Search Post
 * @authenticated
 * API endpoints for searching through Post
 */
class SearchController extends Controller
{
    /**
     * Search Through All Posts
     *
     * @queryParam page[number] int The page number.
     * @queryParam page[size] int The page number.
     *
     * @apiResourceCollection App\Http\Resources\Post\PostCollection
     * @apiResourceModel App\Models\Post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters(['description', 'condition', 'title'])->where('status','=', PostStatus::OPEN)->jsonPaginate();
        return $this->sendSuccess([new PostCollection($posts)]);
    }
}
