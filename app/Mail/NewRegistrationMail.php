<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    /**
     * Créer un nouveau message.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Sujet de l'email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande d’inscription - ÉtudeEnLigne',
        );
    }

    /**
     * Contenu de l'email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-registration',
        );
    }

    /**
     * Pièces jointes.
     */
    public function attachments(): array
    {
        return [];
    }
}