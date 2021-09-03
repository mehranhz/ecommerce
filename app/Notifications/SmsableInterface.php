<?php


namespace App\Notifications;


interface SmsableInterface
{
    public function getMessage();

    public function getPhone();
}
