<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Repositories\Eloquent\Repository\PostRepository;


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
        // dd('jsjs');
        return $this->sendSuccess([new PostCollection($this->postRepository->all(['*'], ['user', 'category', 'user.wallet']))]);
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
        $data = $this->postRepository->create($request->validated());
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
        return $this->sendSuccess([new PostResource($post->loadCount('comments'))], 'Post successfully retrieved');
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
        $data = $this->postRepository->update($post->id, $request->validated());
        broadcast(new PostCreatedEvent($data))->toOthers();
        return $this->sendSuccess([new PostResource($data)], 'Post successfully created');
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
        $this->authorize('delete', $post);
        $post->deleteOrFail();
        return $this->sendSuccess([], 'Post deleted successfully');
    }
}
