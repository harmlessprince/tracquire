<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;


/**
 * @group Comment
 * @authenticated
 * API endpoints for Post CRUD
 */
class PostCommentRelatedController extends Controller
{

    /**
     * All Comments
     *
     * This endpoint can be used to fetch all comments under a post
     *
     * @apiResourceCollection App\Http\Resources\Comment\CommentCollection
     * @apiResourceModel App\Models\Comment
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Post $post)
    {
        return $this->sendSuccess(
            ['comments' => new CommentCollection($post->comments)], 'Post comments retrieved successfully'
        );
    }


    /**
     *
     * Create Post
     *
     * @apiResource App\Http\Resources\Comment\CommentResource
     * @apiResourceModel App\Models\Comment
     *
     * @param \App\Http\Requests\StoreCommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, Post $post) : Response
    {
        $comment = new Comment([
            'body' => $request->body,
            'created_by' => auth('api')->id(),
        ]);
        $comment = $post->comments()->save($comment);
        $post->load('user');
        $comment->load('author');
        event(new NewCommentNotification($post, $comment));
        return $this->sendSuccess([new CommentResource($comment)]);
    }

}
