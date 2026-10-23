<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'title',
        'description',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


    public function attempts()
{
    return $this->hasMany(QuizAttempt::class);
}
}