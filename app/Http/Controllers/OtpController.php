<?php

namespace App\Http\Controllers;

use App\Enums\UserActionEnum;
use App\Events\CreditUserWalletEvent;
use App\Helper\HttpResponseCodes;
use App\Http\Requests\VerifyOtpRequest;
use App\Models\User;
use Seshac\Otp\Otp;

/**
 * @group OTP
 *
 * API endpoints for generating and verifying OTP
 */
class OtpController extends Controller
{

    /**
     * Generate OTP
     *
     * This endpoint sends otp token the provided email address
     *
     */
    //    public function generateOtp(GenerateOtpRequest $request): Response
    //    {
    //        $email = $request->email;
    //        $otp = Otp::generate($email);
    //        if (!$otp->status){
    //            return $this->sendError($otp->message, HttpResponseCodes::TOKEN_GENERATION_FAIL);
    //        }
    //        Notification::route('mail', $email)->notify(new OtpNotification($otp));
    //        return $this->sendSuccess(['status' => true, 'message' => 'OTP generated'], "Otp sent to registered email: ${email}");
    //    }

    /**
     * Verify OTP
     *
     * This endpoint can be used to verify OTP sent to a user
     *
     */
    public function verifyOtp(VerifyOtpRequest $request): \Illuminate\Http\Response
    {
        $user = User::where('email', $request->email)->first();
        if (!$user->hasVerifiedEmail()) {
            $verify = Otp::validate($request->email, $request->otp);
            if (!$verify->status) {
                return $this->sendError($verify->message, HttpResponseCodes::TOKEN_VERIFICATION_FAIL);
            }
            $user->markEmailAsVerified();
            if ($user->referrer) {
                event(new CreditUserWalletEvent($user->referrer, UserActionEnum::REFERRAL));
            }
            //            \Seshac\Otp\Models\Otp::where(['identifier' => $request->email, 'token' => $request->otp])->first()->delete();
        } else {
            return $this->sendError('Email has already been verified', 400);
        }
        return $this->sendSuccess([$verify], 'Email address verified');
    }
}
