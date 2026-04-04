<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReclamationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    // ═══ PROPRIÉTÉS ═════════════════════════════════════════════════════════════

    /**
     * Données de la réclamation à inclure dans l'email
     * 
     * @var array
     */
    public $data;

    // ═══ CONSTRUCTEUR ════════════════════════════════════════════════════════════

    /**
     * Crée une nouvelle instance de message
     * 
     * @param  array  $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // ═══ CONSTRUCTION DE L'EMAIL ════════════════════════════════════════════════

    /**
     * Obtient l'enveloppe du message
     * 
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ Confirmaton de votre réclamation - Congrès SOCEDIAMN 2026',
            from: config('mail.from.address'),
            replyTo: [config('mail.from.address')],
        );
    }

    /**
     * Obtient la définition du contenu du message
     * 
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reclamation-confirmation',
            with: [
                'civilite' => $this->data['civilite'] ?? '',
                'nom' => $this->data['nom'] ?? '',
                'prenom' => $this->data['prenom'] ?? '',
                'objet' => $this->data['objet'] ?? '',
                'numero' => $this->data['numero'] ?? '',
            ],
        );
    }

    /**
     * Obtient les attachements du message
     * 
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
