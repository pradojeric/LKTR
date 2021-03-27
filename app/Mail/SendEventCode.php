<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventCode extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $event)
    {
        //
        $this->details = $details;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Elektro')->view('email.code_email');
    }
}
