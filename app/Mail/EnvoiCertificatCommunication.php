<?php

namespace App\Mail;

use App\Models\ComOraleValide;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoiCertificatCommunication extends Mailable
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
            subject: 'Certificat Communication Orale',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $com = ComOraleValide::where('numero', $this->id)->first();
       // $communication = DB::table('abstracts')->where('email', $com->email)->first();
        return new Content(
            view: 'email.communication-certificat',
            with: [
                'data'=>$com,
                'com'=>$com,
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
