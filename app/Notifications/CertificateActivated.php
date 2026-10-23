<?php

namespace App\Notifications;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CertificateActivated extends Notification
{
    use Queueable;

    public function __construct(
        public Certificate $certificate
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Certificat activé',
            'message' => 'Bonjour ' . $notifiable->name
                . ', votre certificat a été activé avec succès !',
            'certificate_id' => $this->certificate->id,
            'formation_id' => $this->certificate->formation_id,
        ];
    }
}
