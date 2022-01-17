<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Shot\ShotCollection;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Shot
 * @authenticated
 * API endpoints for managing users shot
 */
class UserShotController extends Controller
{
     /**
     * All User Shots
     * @apiResourceCollection App\Http\Resources\Shot\ShotCollection
     * @apiResourceModel App\Models\Shot
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user) {
        return $this->sendSuccess([new ShotCollection($user->shots)]);
    }
}
