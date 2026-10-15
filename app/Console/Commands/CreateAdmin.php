<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * Command name.
     */
    protected $signature = 'admin:create';

    /**
     * Command description.
     */
    protected $description = 'Créer un compte administrateur';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('=== Création du compte administrateur ===');

        // Nom
        $name = $this->ask('Nom complet de l’administrateur');

        // Email
        $email = $this->ask('Email');

        // Vérifier si l'email existe déjà
        if (User::where('email', $email)->exists()) {
            $this->error('Cet email existe déjà dans la base de données.');

            return self::FAILURE;
        }

        // Password
        $password = $this->secret('Mot de passe');

        // Confirmation password
        $passwordConfirmation = $this->secret('Confirmer le mot de passe');

        if ($password !== $passwordConfirmation) {
            $this->error('Les deux mots de passe ne correspondent pas.');

            return self::FAILURE;
        }

        // Création de l'administrateur
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),

            'role' => 'admin',
            'status' => 'confirmed',

            'whatsapp_phone' => null,
            'confirmation_code' => null,
            'confirmed_at' => now(),
        ]);

        $this->newLine();

        $this->info('Administrateur créé avec succès !');

        $this->table(
            ['Champ', 'Valeur'],
            [
                ['Nom', $name],
                ['Email', $email],
                ['Role', 'admin'],
                ['Status', 'confirmed'],
            ]
        );

        return self::SUCCESS;
    }
}