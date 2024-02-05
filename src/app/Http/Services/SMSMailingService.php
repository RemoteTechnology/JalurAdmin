<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\SMSMailingServiceInterface;
use Zelenin\SmsRu\Auth\ApiIdAuth;
use Zelenin\SmsRu\Api;
use Zelenin\SmsRu\Entity\Sms;
use Zelenin\SmsRu\Client\Client;
use Zelenin\SmsRu\Response\SmsStatusResponse;

// https://sms.ru/php
// https://github.com/zelenin/sms_ru
class SMSMailingService implements SMSMailingServiceInterface
{
    public static function send(string $phone, string $text): SmsStatusResponse
    {
        $client = new Api(new ApiIdAuth(env('SMS_RU_ID')), new Client());
        $client->smsSend(new Sms($phone, $text));
        return $client->smsStatus(env('SMS_RU_ID'));
    }
}
