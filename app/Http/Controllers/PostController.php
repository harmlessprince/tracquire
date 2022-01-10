<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Repositories\Eloquent\Repository\PostRepository;
use http\Client\Request;


/**
 * @group Post
 * @authenticated
 * API endpoints for Post CRUD
 */
class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * All Posts
     * @apiResourceCollection App\Http\Resources\Post\PostCollection
     * @apiResourceModel App\Models\Post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendSuccess([new PostCollection($this->postRepository->all())]);
    }

    /**
     * Search Through All Posts
     * @apiResourceCollection App\Http\Resources\Post\PostCollection
     * @apiResourceModel App\Models\Post
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        $posts = $this->postRepository->search();
        return $this->sendSuccess([new PostCollection($posts)]);
    }

    /**
     *
     * Create Post
     * 
     * @apiResource App\Http\Resources\Post\PostResource
     * @apiResourceModel App\Models\Post
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $this->postRepository->create($request->all());
        broadcast(new PostCreatedEvent($data))->toOthers();
        return $this->sendSuccess([new PostResource($data)], 'Post successfully created');
    }

    /**
     * Show Post
     * 
     * @apiResource App\Http\Resources\Post\PostResource
     * @apiResourceModel App\Models\Post
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $this->sendSuccess([new PostResource($post)], 'Post successfully retrieved');
    }

    /**
     * 
     * Edit Post
     * 
     * @apiResource App\Http\Resources\Post\PostResource
     * @apiResourceModel App\Models\Post
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * 
     * Update Post
     * 
     * @apiResource App\Http\Resources\Post\PostResource
     * @apiResourceModel App\Models\Post
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * 
     * Delete Post
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
