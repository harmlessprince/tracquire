<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShotRequest;
use App\Http\Resources\Shot\ShotCollection;
use App\Http\Resources\Shot\ShotResource;
use App\Models\Post;
use App\Models\Shot;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



/**
 * @group Shot
 * @authenticated
 * API endpoints for managing posts shots
 */
class PostShotRelatedController extends Controller
{
    /**
     * All Shots
     * @apiResourceCollection App\Http\Resources\Shot\ShotCollection
     * @apiResourceModel App\Models\Shot
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return $this->sendSuccess(
            ['shots' => new ShotCollection($post->shots)],
            'Post shots retrieved successfully'
        );
    }

    /**
     *
     * Create Shot
     *
     * @apiResource App\Http\Resources\Shot\ShotResource
     * @apiResourceModel App\Models\Shot
     *
     * @param \App\Http\Requests\StoreShotRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShotRequest $request, Post $post): Response
    {
        $userAlreadyHasAShot = $post->shots()->where('user_id', auth('api')->id())->exists();
    
        if (!$userAlreadyHasAShot) {
            $shot = new Shot([
                'post_id' => $post->id,
                'user_id' => auth('api')->id(),
                'description' => $request->description,
                'condition' => $request->condition,
            ]);
            $shot = $post->shots()->save($shot);
            if ($request->hasFile('images')) {
                foreach (request()->images as $image) {
                    $shot->attachMedia($image);
                }
            }
            $shot = $shot->refresh();
            return $this->sendSuccess([new ShotResource($shot)], 'Shot successful created');
        }
        return $this->sendError('You are not allowed to shoot more than one shot', 401);
    }

    /**
     * Show Shot
     *
     * @apiResource App\Http\Resources\Shot\ShotResource
     * @apiResourceModel App\Models\Shot
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Shot $shot
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Shot $shot)
    {
        if ($shot->post_id != $post->id) {
            return $this->respondError('Supplied short doest not belong to the supplied post', 404);
        }
        return new ShotResource($shot);
    }

    /**
     *
     * Edit Shot
     *
     * @apiResource App\Http\Resources\Shot\ShotResource
     * @apiResourceModel App\Models\Shot
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Shot $shot)
    {
        //
    }

    /**
     * Update Shot
     *
     * @apiResource App\Http\Resources\Shot\ShotResource
     * @apiResourceModel App\Models\Shot
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shot $shot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shot $shot)
    {
        //
    }

    /**
     * Delete Shot
     *
     * @param \App\Models\Shot $shot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shot $shot)
    {
        //
    }
}
