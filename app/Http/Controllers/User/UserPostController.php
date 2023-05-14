<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

/**
 * @group User
 * @authenticated
 * API endpoints for managing users posts
 */

class UserPostController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * All User Posts
     * @apiResourceCollection App\Http\Resources\Post\PostCollection
     * @apiResourceModel App\Models\Post
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $posts = Post::query()->where('user_id', $user->id)->with('user','category')->withCount('comments')->paginate();
        return $this->sendSuccess([new PostCollection($posts)]);
    }
}
