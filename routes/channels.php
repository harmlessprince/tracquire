<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Musonza\Chat\Models\Conversation;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return $user->id === $userId;
},['guards' => ['auth:api']]);

Broadcast::channel('chat-conversation-{conversation_id}', function ($user, $conversation_id) {
    $conversation = Conversation::where('id', $conversation_id)->first();
    if (!$conversation) {
        return false;
    }

    if ($conversation->participantFromSender($user)) {
        return true;
    }
    return false;
}, ['guards' => ['auth:api']]);
