<?php

namespace App\Http\Services\Contracts;
use Psr\Http\Message\ResponseInterface;

interface SMSMailingServiceInterface
{
    public function smsSend(string $phone, string $text): ResponseInterface;
}
