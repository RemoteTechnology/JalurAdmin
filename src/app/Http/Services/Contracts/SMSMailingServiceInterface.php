<?php

namespace App\Http\Services\Contracts;
use Zelenin\SmsRu\Response\SmsStatusResponse;

interface SMSMailingServiceInterface
{
    public static function send(string $phone, string $text): SmsStatusResponse;
}
