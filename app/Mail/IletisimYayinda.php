<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IletisimYayinda extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $gidenMail;

    public function __construct($bilgiler)
    {
        $this->gidenMail=$bilgiler;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.email.yayindaIletisim')->subject('Elegans Reklam Reklam Yayında ');
    }
}
