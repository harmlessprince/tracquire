<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConversationCollection;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Conversions\Conversion;

class ConversationController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user()->load('conversations');
        $conversations = $user->conversations;
        return    $this->sendSuccess([new ConversationCollection($conversations)]);
    }
    public function delete(Conversion $conversion)
    {
        //Consider deletion of conversation from only one side
        // $conversion->dele
        // $conversations = $user->conversations;
        // return    $this->sendSuccess([new ConversationCollection($conversations)]);
    }
}
