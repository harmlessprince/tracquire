<?php

namespace App\Http\Controllers;

use App\Helper\Enum;
use App\Helper\HttpResponseCodes;
use App\Helper\UserStatus;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Seshac\Otp\Otp;

class AuthenticationController extends Controller
{
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
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'phone' => $request->input('phone'),
                    'lat' => $request->input('lat'),
                    'lng' => $request->input('lng'),
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
            $user->sendWelcomeNotification();
            return $this->sendSuccess(['user' => $user], 'Registration successful!');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), 400);
        }

    }


    /**
     * THis logs the user out of the application
     */

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->sendSuccess(['Successfully logged out'], HttpResponseCodes::ACTION_SUCCESSFUL);
    }

    /**
     * return authenticated user
     */
    public function user()
    {
        return $this->sendSuccess([new UserResource(Auth::user())]);
    }
}
