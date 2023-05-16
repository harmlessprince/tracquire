<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\User;
use App\Repositories\Eloquent\Repository\MessageRepository;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Musonza\Chat\Facades\ChatFacade;
use Musonza\Chat\Models\Conversation as ModelsConversation;
use Musonza\Chat\Models\Message;

use function GuzzleHttp\Promise\each;

/**
 * @group Messaging
 * @authenticated
 * API endpoints for chat integrate
 */

class MessageController extends Controller
{
    private MessageRepository $messageRepository;
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Create Message
     *
     * @param StoreMessageRequest $request
     * @return Response
     */
    public function store(StoreMessageRequest $request, ModelsConversation $conversation): Response
    {
        if (auth()->id() == $request->receiver_id) {
            return $this->respondError('You are not allowed to message your self');
        }
        $sender = User::findOrFail(auth()->id());
        $receiver = User::findOrFail($request->receiver_id);
        if ($conversation->participantFromSender($sender) == null) {
            return $this->respondError('You are not part of the supplied conversation');
        }
        $message = ChatFacade::message($request->message)
            ->type($request->type ?? 'text')
            ->data($request->data ?? [])
            ->from($sender)
            ->to($conversation)
            ->send();
        broadcast(new MessageSentEvent($message, $receiver))->toOthers();
        return $this->sendSuccess([new MessageResource($message)], 'Message sent', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(int $message_id)
    {
        $message = ChatFacade::messages()->getById($message_id);
        return $this->sendSuccess([new MessageResource($message)], 'Message retrieved');
    }

   
      /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        ChatFacade::message($message)->setParticipant(User::findOrFail(auth()->id()))->delete();
        return $this->sendSuccess([], 'Message deleted successfully');
    }
}
