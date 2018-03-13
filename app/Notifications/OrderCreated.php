<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreated extends Notification
{
    use Queueable;
    private $purchase;
    private $user;
    private $gig;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($purchase, $user, $gig)
    {
        $this->purchase = $purchase;
        $this->user = $user;
        $this->gig = $gig;
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'from' => $this->user->name,
            'name'=> $this->user->name,
            'image' => $this->user->profile->avatar,
            'created_at' => $this->purchase->created_at,
            'body' => ' Created an order',
            'gig' => $this->gig,
        ];
    }
}
