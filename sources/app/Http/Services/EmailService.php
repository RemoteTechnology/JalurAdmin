<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\EmailServiceInterface;
use App\Mail\CreateAdminMail;
use Illuminate\Support\Facades\Mail;

class EmailService  implements EmailServiceInterface
{
    public function send(array $data)
    {
        return Mail::to($data["email"])
            ->send(new CreateAdminMail($data["email"], $data));
    }
}
