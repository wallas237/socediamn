<?php

namespace App\Mail;

use App\Models\PosterValide;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ConfirmationPoster extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $id;
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Poster',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $abstract = DB::table('abstracts')->where('id', $this->id)->first();
        if ($abstract) {
            DB::table('abstracts')->where('id', $this->id)->update([
                'confirmation_abstract' => 1,
                'type_abstract' => "Poster"
            ]);
            $comValide = PosterValide::create([
                'code' => $abstract->id,
                'titre' => $abstract->titre,
                'email' => $abstract->email,
                'nom' => $abstract->name,

            ]);
        }
        $resume = PosterValide::where('code', $this->id)->first();

        return new Content(
            view: 'email.abstract.confirmation-poster',
            with: ['data' => $abstract, 'com' => $resume]
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
