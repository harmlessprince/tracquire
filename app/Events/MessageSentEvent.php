<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Musonza\Chat\Eventing\MessageWasSent;

class MessageSentEvent extends MessageWasSent implements ShouldQueue, ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $receiver;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $receiver)
    {
        parent::__construct($message);
        $this->receiver = $receiver;
    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-conversation-' . $this->message->conversation_id);
    }
    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'message_sent_event';
    }
}
