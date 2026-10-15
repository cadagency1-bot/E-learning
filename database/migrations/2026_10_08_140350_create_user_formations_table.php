<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_formations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('formation_id')
                ->constrained('formations')
                ->cascadeOnDelete();

            /*
             * pending = demande en attente
             * active  = accès accordé par l'administration
             * rejected = demande refusée
             */
            $table->enum('status', [
                'pending',
                'active',
                'rejected',
            ])->default('pending');

            $table->timestamp('activated_at')->nullable();

            $table->timestamps();

            // Un étudiant ne peut pas demander deux fois
            // exactement la même formation.
            $table->unique(['user_id', 'formation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_formations');
    }
};