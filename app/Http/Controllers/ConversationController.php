<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    //
    public function index()
    {
        $conversations = auth()->user()->load('conversations');
        return $conversations;
    }
}
