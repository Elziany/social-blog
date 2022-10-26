<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class userNotification extends Notification
{
    use Queueable;
    public $user;
    public $notificationText ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$notificationText)
    {
        //
        $this->user=$user;
        $this->notificationText=$notificationText;
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


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id'=>$this->user->id,
            'user_name'=>$this->user['name'],
            'email'=>$this->user['email'],
            'notificationText'=>$this->user['email'].$this->notificationText
        ];
    }
}
