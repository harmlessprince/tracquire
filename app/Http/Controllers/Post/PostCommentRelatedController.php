<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostCommentRelatedController extends Controller
{
    public function index(Post $post) {
//        return $post;

        return $this->sendSuccess(
            ['comments' => new CommentCollection($post->comments)], 'Post comments retrieved successfully'
        );
    }
}
