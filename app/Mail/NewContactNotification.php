<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $content;
    public $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {        
        $this->content = $content;
        $this->logo = env('APP_URL') . "/images/logo.svg";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->markdown('emails.contact');
    }
}
