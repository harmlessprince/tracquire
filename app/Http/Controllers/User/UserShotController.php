<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
    public function index() {

    }
}
