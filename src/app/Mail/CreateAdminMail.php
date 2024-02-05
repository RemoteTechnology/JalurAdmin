<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $_subject;
    public array $_data;
    /**
     * Create a new message instance.
     */
    public function __construct(string $subject, array $data)
    {
        $this->_subject = $subject;
        $this->_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('email.create_admin');
    }
}
