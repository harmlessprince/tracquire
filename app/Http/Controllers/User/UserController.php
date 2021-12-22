<?php

namespace App\Http\Controllers\User;

use App\Helper\HttpResponseCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
//        return $user;
        $user = $this->userRepository->update($user->id, $request->validated());
        if ($user){
            return $this->sendSuccess([], 'Profile successfully updated', HttpResponseCodes::NO_CONTENT);
        }
        return  $this->sendError('Something went wrong, please try again later', HttpResponseCodes::ACTION_FAILED);
    }
}
