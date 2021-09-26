<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Courier\CourierClient;

class Courier
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toCourierRequest($notifiable);

        $courier = new CourierClient(env(COURIER_DOMAIN), env(COURIER_TOKEN));


        $result = $courier->sendNotification(
          "2EG2H77C8PM69XNQW7ED10RHFEAW",
          "988fc862-70b7-4cdb-a6dc-bd95fb449cba",
          NULL,
          (object) [
          ],
          (object) [
            'name' => "John Doe",
            'task_title' => $data['task'],
          ]
        );
    }
}
