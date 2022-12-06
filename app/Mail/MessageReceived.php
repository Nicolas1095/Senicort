<?php

namespace App\Mail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $msg;
    public $subject = "Mensaje recibido desde el sitio web";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg, $email, $name, $subject)
    {
        $this->msg = $msg;
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(env('MAIL_FROM_ADDRESS'), $this->name);
        $this->priority('high');
        $this->subject($this->subject);
        $this->view('emails.message-received');
        $this->replyTo($this->email, $this->name);
        return $this;
    }
}
