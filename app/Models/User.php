<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'whatsapp_phone',
        'password',
        'role',
        'status',
        'confirmation_code',
        'confirmed_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'confirmation_code',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'confirmed_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Formations demandées ou activées par l'étudiant.
     */
    public function formations()
    {
        return $this->belongsToMany(
            Formation::class,
            'user_formations'
        )->withPivot([
            'status',
            'activated_at',
        ])->withTimestamps();
    }
}