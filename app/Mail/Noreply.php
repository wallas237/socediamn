<?php

namespace App\Mail;

use App\Models\Abstracts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Correction d'information - Veuillez ignorer nos précédents emails",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $civilite = Abstracts::where('email', $this->data->email)->first();
        return new Content(
            view: 'email.abstract.excuse-mail',
            with: [
                'data'=>$civilite,
            ]
        );
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
