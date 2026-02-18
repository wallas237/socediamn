<?php

namespace App\Mail;

use App\Models\Abstracts;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AbstractEnvoye extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public Abstracts $content;
    public $subject = "Soumission d'abstract au congrès SOCEDIAMN & SFADE";

    public function __construct(Abstracts $content)
    {
        $this->content = $content;
    }
    
    /**
     * Get the message envelope.
     */
  

    /**
     * Get the message content definition.
     */
     public function build()
    {
        return $this->view('email.abstract-envoye', ['data'=>$this->content]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
