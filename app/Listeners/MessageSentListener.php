<?php

namespace App\Listeners;

use App\Notifications\MessageSentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Musonza\Chat\Models\MessageNotification;

class MessageSentListener
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
        $event->receiver->notify(new MessageSentNotification($event->message, $event->receiver));
    }
}
