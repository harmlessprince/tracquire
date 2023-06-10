<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSentNotification extends Notification
{
    use Queueable;

    public $message;
    public $receiver;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $receiver)
    {
        $this->message = $message;
        $this->receiver = $receiver;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)->view(
        //     'email.new-message',
        //     $this->getData()
        // );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return $this->getData();
    }

    public function getData(): array
    {
      
        $sender  = $this->message->sender;
        $receiver  = $this->receiver;
        return [
            'id'              => $this->message->getKey(),
            'body'            => $this->message->body,
            'conversation_id' => $this->message->conversation_id,
            'type'            => $this->message->type,
            'data'            => $this->message->message,
            'created_at'      => $this->message->created_at,
            'sender'          => $sender,
            'receiver' => $receiver,
        ];
    }
}
