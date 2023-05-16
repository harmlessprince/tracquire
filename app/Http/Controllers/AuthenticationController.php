<?php

namespace App\Http\Controllers;

use App\Enums\UserActionEnum;
use App\Enums\UserStatus;
use App\Events\CreditUserWalletEvent;
use App\Events\SignupEvent;
use App\Helper\Helper;
use App\Helper\HttpResponseCodes;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 *
 * API endpoints for managing authentication
 */
class AuthenticationController extends Controller
{

    /**
     * Log in the user.
     *
     * @bodyParam   email    string  required    The email of the  user.      Example: john@example.com
     * @bodyParam   password    string  required    The password of the  user.   Example: password
     *
     * @response {
     *  "status": "success",
     *  "data": {
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiO............."
     *  "user": {
     *  "id": 4,
     * "first_name": "John",
     * "last_name": "Doe",
     * "username": "amara.kutch",
     * "phone": "09012341234",
     * "email": "john@example.com",
     * "user_type": 1,
     * "email_verified_at": "2022-01-09T08:51:19.000000Z",
     * "device_name": "postman",
     * "status": 0,
     * "ip": "172.02.190",
     * "latitude": "12.10000000",
     * "longitude": "23.33000000",
     * "country": "Nigeria",
     * "state": "Lagos",
     * "city": "ikeja",
     * "deleted_at": null,
     * "created_at": "2022-01-09T08:51:20.000000Z",
     * "updated_at": "2022-01-09T08:51:20.000000Z"
     *   }
     * },
     * "message": "Logged in successfully!"
     * }
     * @response 401 scenario="Invalid Credential" { "status": "error",  "data": [],  "message": "invalid email or password",  "code": 401}
     *
     */
    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->validated())) {
                /**
                 * @var User $user
                 */
                $user = Auth::user();
                $token = $user->createToken($user->device_name)->accessToken;
                return $this->sendSuccess(['token' => $token, 'user' => $user], "Logged in successfully!");
            }
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), 400);
        }
        return $this->sendError('invalid email or password', 401);
    }


    /**
     *
     * Register user.
     *
     *
     * @response {"status":"success",
     * "data":{
     *  "user":{
     *      "email":"admuin1@dev.com",
     *      "device_name":"PostmanRuntime/7.26.8",
     *      "status":2,
     *      "updated_at":"2022-01-09T21:18:14.000000Z",
     *      "created_at":"2022-01-09T21:18:14.000000Z",
     *      "id":5,
     *      "email_verified_at":"2022-01-09T21:18:14.000000Z"
     * },
     *  "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ...."},
     *  "message":"Registration successful!"
     * },
     * @response 422 scenario="Email Exist"
     * {"status":"error",
     * "data":{
     * "errors":{
     *  "email":["The email has already been taken."]
     * }
     * },
     *  "message":"The given data failed to pass validation.",
     *  "code":9
     * }
     */
    public function register(RegisterRequest $request)
    {

        try {
            if ($request->has('device_name')) {
                $device = $request->device_name;
            } else {
                $device = $request->header('User-Agent');
            }
            $referrer_code = $request->referrer;
            $referrer = User::whereNotNull('referrer_token')->where('referrer_token', $referrer_code)->first();
            $data = [
                'email' => $request->email,
                'device_name' => $device,
                'password' => Hash::make($request->password),
                'referral_token' => Helper::refCodeGenerator(),
                'referrer_id' => $referrer->id ?? null,
                'device' => $device
            ];
            $user = $this->createUser($data);
            event(new CreditUserWalletEvent($user, UserActionEnum::SIGNUP));
            event(new SignupEvent($user));
            $token = $user->createToken($user->device_name)->accessToken;
            return $this->sendSuccess(['user' => new UserResource($user), 'token' => $token], 'Registration successful! and OTP has been sent to your'.$user->emaol.'for verification');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), 400);
        }
    }


    /**
     * Log user out of the app
     */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->sendSuccess(['Successfully logged out'], HttpResponseCodes::ACTION_SUCCESSFUL);
    }

    /**
     * Get authenticated user profile
     */
    public function user()
    {
        $user = \auth()->user();
        return $this->sendSuccess([new UserResource($user->loadCount('posts', 'userTransactions')->load('posts', 'userTransactions'))], 'Profile successfully retrieved');
    }

    private function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'device_name' => $data['device'],
            'password' =>$data['password'],
            'status' => UserStatus::IN_REVIEW,
            'referrer_token' => $data['referral_token'],
            'referrer_id' => $data['referrer_id']
        ]);
    }

    public function  updatePassword(UpdatePasswordRequest $request)
    {
        $user = $request->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return $this->respondError('The current password supplied is incorrect');
        }
        //prepare password for saving into the database
        $user->password = Hash::make($request->password);
        //Save user password into the user table
        $user->save();
        // $user->tokens()->delete();

        return $this->sendSuccess([], 'Password updated successfully');
    }
}
