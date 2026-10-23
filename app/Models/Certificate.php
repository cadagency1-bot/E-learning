<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'formation_id',
        'certificate_number',
        'name_on_certificate',
        'issued_at',
        'status',
        'activated_at',
        'file_path',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'datetime',
            'activated_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}
