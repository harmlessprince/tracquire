<?php

namespace App\Http\Controllers\User;

use App\Helper\HttpResponseCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

/**
 * @group User
 * @authenticated
 * API endpoints for managing users
 */

class UserController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     *  Update User Profile
     * 
     *  This endpoint updates user first name, last name, phone number and username
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        //        return $user;
        $user = $this->userRepository->update($user->id, $request->validated());
        if ($user) {
            return $this->sendSuccess([], 'Profile successfully updated', HttpResponseCodes::NO_CONTENT);
        }
        return  $this->sendError('Something went wrong, please try again later', HttpResponseCodes::ACTION_FAILED);
    }

    /**
     *  User Profile
     * 
     * This endpoint is used to view a particular user profile
     * 
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->sendSuccess([new UserResource($user)], 'Profile successfully retrieved');
    }
}
