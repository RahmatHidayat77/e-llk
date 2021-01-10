<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@operator.ellk.id')
        ->replyTo($this->email,$this->name)
        ->cc('noreply@operator.ellk.id')
        ->view('templatemail.user')
        ->subject('Email Register')
        ->with([               
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password, 
        ])
        ->withSwiftMessage(function ($message) {
            $message->getHeaders() ->addTextHeader('List-Unsubscribe', '/email/unsubscribe');
        });;
    }
}
