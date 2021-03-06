<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReply extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    protected $reply;


    public function __construct($message, $reply)
    {
        $this->message = $message;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $reply = $this->reply;
        return $this->to($contactMessage->email)
        ->view('admin.mails.reply-message', compact('contactMessage','reply'));


    }
} 
