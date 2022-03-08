<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Resources\Message\MessageCollection;
use App\Http\Resources\Message\MessageResource;
use App\Models\Conversation;
use App\Models\Message;
use App\Repositories\Eloquent\Repository\MessageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\each;

/**
 * @group Messaging 
 * @authenticated
 * API endpoints for chat integrate
 */

class MessageController extends Controller
{
    private $messageRepository;
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->sendSuccess([new MessageCollection($this->messageRepository->chats())], 'Messages retrieved', 200);
    }



    /**
     * Create Message
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $conversation = Conversation::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'sender_id' => $request->sender_id
            ],
            [
                'last_msg' => Str::limit($request->message),
                'unseen_number' => DB::raw('unseen_number+1')
            ]
        );
        $message = $conversation->messages()->create([
            'sender_id' => $request->sender_id,
            'message' => $request->message
        ]);
        // $message = $this->messageRepository->send($request->validated());
        return $this->sendSuccess([new MessageResource($message)], 'Message sent', 201);
    }

    /*
     * Show Latest Messages.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($receiver)
    {
        $messages = $this->messageRepository->latestMessages($receiver);
        return $this->sendSuccess([new MessageCollection($messages)], 'Messages retrieved', 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
