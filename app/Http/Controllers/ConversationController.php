<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Resources\ConversationCollection;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\User;
use Illuminate\Http\Request;
use Musonza\Chat\Facades\ChatFacade;
use Musonza\Chat\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = ChatFacade::conversations()->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant(auth()->user())
            ->limit(request('limit', 15))
            ->page(request('page', 1))
            ->get('participants');

        return $this->sendSuccess(['conversations' => $conversations], 'Retrieved conversations');
    }

    public function store(StoreConversationRequest $request)
    {
        $sender = User::query()->where('id', $request->user()->id)->first();
        $receiver = User::query()->where('id', $request->input('receiver_id'))->first();
        $participants = [$sender, $receiver];
        $conversation = ChatFacade::conversations()->between($sender, $receiver);
        if (!$conversation && $request->input('message')) {
            $conversation = ChatFacade::makeDirect()->createConversation($participants, $request->input('data', []))->load('participants');
            $message = ChatFacade::message($request->message)
                ->type($request->type ?? 'text')
                ->data($request->data ?? [])
                ->from($sender)
                ->to($conversation)
                ->send();
            broadcast(new MessageSentEvent($message, $receiver))->toOthers();
        } else {
            return $this->sendError('Conversation does not exist', 987);
        }
        return $this->sendSuccess(['conversation' => new ConversationResource($conversation)], 'Conversation created successfully');
    }

    public function conversationExists(Request $request, User $receiver)
    {
        $sender = User::query()->where('id', $request->user()->id)->first();
        $conversation = ChatFacade::conversations()->between($sender, $receiver);
        if (!$conversation) {
            return $this->sendSuccess(['conversationExists' => false], 'No Conversation');
        }
        return $this->sendSuccess(['conversationExists' => true, 'conversation' => new ConversationResource($conversation)], 'Conversation exists');
    }

    public function show(Conversation $conversation)
    {
        $conversation =  $conversation->load('participants');
        $messages = ChatFacade::conversation($conversation)->setParticipant(auth()->user())
            ->setPaginationParams(['sorting' => 'desc'])
            ->limit(request('limit', 25))
            ->page(request('page', 1))
            ->getMessages();
        return $this->sendSuccess(['message' => new MessageCollection($messages)], 'Retrieved  Messages');
    }

    public function destroy(Conversation $conversation)
    {
        ChatFacade::conversation($conversation)->setParticipant(auth()->user())->clear();
        return $this->sendSuccess([], 'Messages cleared');
    }
}
