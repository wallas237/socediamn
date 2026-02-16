<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Noreply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Préparation du 5ème  congrès SOCEDIAMN et 8ème Congrès de la SFADE";
    public function __construct()
    {
        //
    }

    
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.noreply');
    }
}
