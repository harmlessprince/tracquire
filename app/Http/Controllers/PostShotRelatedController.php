<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShotRequest;
use App\Http\Resources\Shot\ShotCollection;
use App\Http\Resources\Shot\ShotResource;
use App\Models\Post;
use App\Models\Shot;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostShotRelatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return $this->sendSuccess(
            ['shots' => new ShotCollection($post->shots)], 'Post shots retrieved successfully'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
            foreach (request()->images as $image) {
                $shot->addMedia($image)->toMediaCollection('shots', 'shot');
            }
            return $this->sendSuccess([new ShotResource($shot)], 'Shot successful created');
        }
        return $this->sendError('You are not allowed to shoot more than one shot', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Shot $shot)
    {
        return new ShotResource($shot);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
