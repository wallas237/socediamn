<?php

namespace App\Mail;

use App\Models\AtelierSaplfScp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AttestationParticipationAtelierCongres extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Attestation Participation Atelier Congres SAPLF & SCP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $participant = AtelierSaplfScp::find($this->id);
        return new Content(
            view: 'email.attestation-participation-atelier-congres',
            with: [
                'data'=>$participant,
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
