<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\Shot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ShotShootNotification extends Notification
{
    use Queueable;

    public Post $post;

    public Shot $shot;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post, Shot $shot)
    {
        $this->post = $post;
        $this->shot = $shot;
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
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'shot' => $this->shot,
            'post' => $this->post,
        ];
    }
}
