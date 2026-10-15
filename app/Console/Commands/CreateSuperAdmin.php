<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateSuperAdmin extends Command
{
    protected $signature = 'app:create-super-admin';

    protected $description = 'Créer un compte Super Admin';

    public function handle(): int
    {
        $name = $this->ask('Nom du Super Admin');
        $email = $this->ask('Email du Super Admin');

        if (User::where('email', $email)->exists()) {
            $this->error('Cet email existe déjà.');
            return self::FAILURE;
        }

        $password = $this->secret('Mot de passe');
        $confirmation = $this->secret('Confirmer le mot de passe');

        if (empty($password) || $password !== $confirmation) {
            $this->error('Les mots de passe sont vides ou différents.');
            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'super_admin',
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);

        $this->info('Super Admin créé avec succès !');

        return self::SUCCESS;
    }
}
