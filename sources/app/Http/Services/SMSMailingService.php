<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\SMSMailingServiceInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

// https://sms.ru/php
// https://github.com/zelenin/sms_ru
class SMSMailingService extends Client implements SMSMailingServiceInterface
{
    private string $api_token = '';

    /**
     * @return ResponseInterface
     */
    public function smsSend(string $text, string $phone): ResponseInterface
    {
        $url = "https://sms.ru/sms/send?api_id={$this->api_token}&to[$phone]={$text}&json=1";
        return $this->request('GET', $url);
    }
}
