<?php

namespace App\Listeners;

use App\Events\CreditUserWalletEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreditUserWalletListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param CreditUserWalletEvent $event
     * @return void
     * @throws \Bavix\Wallet\Internal\Exceptions\ExceptionInterface
     */
    public function handle(CreditUserWalletEvent $creditUserWalletEvent)
    {
        $creditUserWalletEvent->user->deposit($creditUserWalletEvent->userAction['reward'], ['action' => $creditUserWalletEvent->userAction['name']]);
    }
}
