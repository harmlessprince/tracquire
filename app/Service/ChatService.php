<?php

namespace App\Service;

use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;


class ChatService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    /**
     * @throws \Exception
     */
    public function sendMessage($data)
    {


    }

    public function getChatLists()
    {

    }


    private function createDirectConversation($conversation): Conversation
    {


    }


}
