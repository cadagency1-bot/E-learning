<?php

namespace App\Models;

use App\Models\Cours;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
    ];

    /**
     * Les cours de cette formation.
     */
    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    /**
     * Les quiz de cette formation.
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    /**
     * Les utilisateurs qui ont demandé
     * ou obtenu l'accès à cette formation.
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_formations'
        )->withPivot([
            'status',
            'activated_at',
        ])->withTimestamps();
    }
}