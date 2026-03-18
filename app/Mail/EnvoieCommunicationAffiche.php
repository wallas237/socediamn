<?php

namespace App\Mail;

use App\Models\PosterValide;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvoieCommunicationAffiche extends Mailable implements ShouldQueue
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
            subject: 'Communication Affichée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $com = PosterValide::where('code', $this->id)->first();
        $conference = DB::table('abstracts')->where('email', $com->email)->first();
        return new Content(
            view: 'email.poster-communication',
            with: [
                'data'=>$conference,
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
