<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\Courier;

class TaskDue extends Notification
{
    use Queueable;

    private $userName;
    private $task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userName, $task)
    {
        $this->userName = $userName;
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [Courier::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toCourier($notifiable)
    {
        return collect(['user_name' => $this->userName, 'task_title' => $task->title]);
    }
}
