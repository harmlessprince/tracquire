<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConversationCollection;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user()->load('conversations');
        $conversations = $user->conversations;
        return    $this->sendSuccess([new ConversationCollection($conversations)]);
    }
}
