<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentsIdentifierResource;
use App\Http\Resources\Post\PostsIdentifierResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsCommentsRelationshipsController extends Controller
{
    public function index(Post $post)
    {

        return $this->sendSuccess([CommentsIdentifierResource::collection($post->comments)], 'Data Retrieved successfully');
    }
}
