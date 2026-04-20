<?php

namespace App\Mail;

use App\Models\Inscription;
use App\Models\ServiceRendu;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class EnvoiCertificatScpSaplf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Certificat SOCEDIAMN & SFADE',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $service = ServiceRendu::find($this->id);
        $inscription = Inscription::find($service->	inscription_id);
        return new Content(
            view: 'email.service-rendu.service-rendu-alert',
            with:[
                'service'=>$service,
                'data'=>$inscription
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
