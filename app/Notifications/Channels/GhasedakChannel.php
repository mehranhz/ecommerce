<?php


namespace App\Notifications\Channels;


use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;

class GhasedakChannel
{

    public function send($notifiable, Notification $notification)
    {
        $api = $this->api();
        $message = $this->getMessage($notification);
        $receptor = $this->getPhone($notification);
        $lineNumber = "10008566";
        try {
            $api->SendSimple('09360808510',$message,$lineNumber);
        } catch (ApiException | HttpException $exception) {
            throw $exception;
        }
    }


    public function api()
    {
        return new GhasedakApi(env('GHASEDAKAPI_KEY'));
    }

    /**
     * @throws \Exception
     */
    public function getMessage($notification)
    {
        if (!method_exists($notification, 'getMessage')) {
            throw new \Exception();
        }
        return $notification->getMessage()['message'];
    }

    /**
     * @throws \Exception
     */
    public function getPhone($notification)
    {
        if (!method_exists($notification, 'getPhone')) {
            throw new \Exception();
        }
        return $notification->getPhone();
    }


}
