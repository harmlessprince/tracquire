<?php

namespace App\Http\Controllers;

use App\Enums\UserActionEnum;
use App\Enums\UserStatus;
use App\Events\CreditUserWalletEvent;
use App\Helper\HttpResponseCodes;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Seshac\Otp\Otp;

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
            if (Auth::attempt($request->only('email', 'password'))) {
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
     * @bodyParam   first_name    string  required    The first name of the  user.      Example: John
     * @bodyParam   last_name    string  required    The password of the  user.   Example: Doe
     * @bodyParam   email    string  required    The email of the  user.   Example: secret
     * @bodyParam   password    string  required    The password of the  user.   Example: secret
     * @bodyParam   username    string  required    The username of the  user.   Example: johndoe
     * @bodyParam   token    string  required    The generated otp for the user.   Example: 339XXX
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
            $verify = Otp::validate($request->email, $request->token);
            if ($verify->status) {
                \Seshac\Otp\Models\Otp::where(['identifier' => $request->email, 'token' => $request->token])->first()->delete();
                $device = null;
                if ($request->has('device_name')) {
                    $device = $request->device_name;
                } else {
                    $device = $request->header('User-Agent');
                }
                $user = User::create([
                    'email' => $request->input('email'),
                    'device_name' => $device,
                    'password' => Hash::make($request->input('password')),
                    'status' => UserStatus::IN_REVIEW,
                ]);
            } else {
                return $this->sendError($verify->message, HttpResponseCodes::TOKEN_VERIFICATION_FAIL);
            }
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
            event(new CreditUserWalletEvent($user, UserActionEnum::SIGNUP));
            $user->sendWelcomeNotification();
            $token = $user->createToken($user->device_name)->accessToken;
            return $this->sendSuccess(['user' => $user, 'token' => $token], 'Registration successful!');
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
        return $this->sendSuccess([new UserResource(Auth::user())]);
    }
}
