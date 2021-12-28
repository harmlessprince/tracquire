<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class PostCommentRelatedController extends Controller
{
    public function index(Post $post)
    {
        return $this->sendSuccess(
            ['comments' => new CommentCollection($post->comments)], 'Post comments retrieved successfully'
        );
    }

    /**
     * Store a newly created resource in storage.
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
        return $this->sendSuccess([new CommentResource($comment)]);
    }

}
