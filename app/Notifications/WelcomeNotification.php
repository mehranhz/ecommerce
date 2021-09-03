<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements SmsableInterface,ShouldQueue
{
    use Queueable;

    public $userName;
    public $userPhone;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$phone)
    {
        $this->userName = $name;
        $this->userPhone = $phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChannel::class];
    }

    public function getMessage(){
        sleep(60);
        return [
            'message'=>__('messages.RegistrationWelcome',['name'=>$this->userName]),
        ];
    }

    public function getPhone(){
        return $this->userPhone;
    }

}
