<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @group Password
 *
 * API endpoints for managing authentication
 */

class ForgotPasswordController extends Controller
{

    /**
     *  Forgot Password
     * 
     *  A token will be sent to user email address
     * 
     * @response  401 scenario="Email Does Not Exist" {
     * "status":"error",
     * "data":[],
     * "message":"The supplied email does not exist",
     * "code":404
     * }
     * 
     */
    public function forgot(ForgotPasswordRequest $request)
    {
        $token = Str::random(6);
        $email = $request->input('email');
        if (User::where('email', $email)->doesntExist()) {
            return $this->sendError('The supplied email does not exist', 401);
        }
        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
            ]);
            $user = User::firstWhere('email', $email);
            $user->sendPasswordResetNotification($token);
            return $this->sendSuccess([], 'Please check your email address', 200);
        } catch (\Exception  $exception) {
            return $this->sendError($exception->getMessage(), 400);
        }
    }


    /**
     *  Reset Password
     *
     *  User is expected to supply the token sent to his email address and a new password
     * 
     * @response  401 scenario="Email Does Not Exist" {
     * "status":"error",
     * "data":[],
     * "message":"Token supplied is invalid",
     * "code":404
     * }
     * 
     */
    public function reset(ResetPasswordRequest $request)
    {
        $token = $request->input('token');
        $password = $request->input('password');
        /**
         * Check if token is on password reset table
         */
        $isTokenValid = DB::table('password_resets')->where('token', $token)->first();
        if (!$isTokenValid) {
            return $this->sendError('Token supplied is invalid', 401);
        }

        /**
         * @var User $user
         * Get the corresponding email for the supplied token
         */
        $user = User::where('email', $isTokenValid->email)->first();
        if (!$user) {
            return  $this->sendError('User does\'t exist', 404);
        }
        //prepare password for saving into the dataas
        $user->password = Hash::make($password);
        //Save user password into the user table
        $user->save();
        return $this->sendSuccess([], 'Success!!, Password has been updated.', 200);
    }
}
