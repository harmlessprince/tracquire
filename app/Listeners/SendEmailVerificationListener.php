<?php

namespace App\Listeners;

use App\Helper\HttpResponseCodes;
use App\Notifications\OtpNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Seshac\Otp\Otp;

class SendEmailVerificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->user->email;
        $otp = Otp::generate($email);
        Notification::route('mail', $email)->notify(new OtpNotification($otp));
    }
}
