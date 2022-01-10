<?php

namespace App\Http\Controllers;

use App\Helper\HttpResponseCodes;
use App\Helper\HttpResponseMessages;
use App\Http\Requests\GenerateOtpRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Notifications\OtpNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Seshac\Otp\Otp;

/**
 * @group OTP 
 * 
 * API endpoints for generating and verifying OTP
 */

class OtpController extends Controller
{
    public function generateOtp(GenerateOtpRequest $request): Response
    {
        $email = $request->email;
        $otp = Otp::generate($email);
        if (!$otp->status){
            return $this->sendError($otp->message, HttpResponseCodes::TOKEN_GENERATION_FAIL);
        }
        Notification::route('mail', $email)->notify(new OtpNotification($otp));
        return $this->sendSuccess(['status' => true, 'message' => 'OTP generated'], "Otp sent to registered email: ${email}");
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        $verify = Otp::validate($request->identifier, $request->token);
        if (!$verify->status){
            return $this->sendError($verify->message, HttpResponseCodes::TOKEN_VERIFICATION_FAIL);
        }
        return $this->sendSuccess([$verify], $verify->message);
    }
}
