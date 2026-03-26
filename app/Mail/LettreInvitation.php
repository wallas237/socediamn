<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LettreInvitation extends Mailable
{
    use  SerializesModels;

    /**
     * Create a new message instance.
     */
    public $participant;
    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lettre Invitation au congrès de la SOCEDIAMN & SFADE',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.lettre-invitation',
            with: [
                'data' => $this->participant,
            ],

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('final_programme_5_congrès_SOCEDIAMN_2026 _avec_auteurs.pdf'))
                ->as('final_programme_5_congrès_SOCEDIAMN_2026 _avec_auteurs.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
