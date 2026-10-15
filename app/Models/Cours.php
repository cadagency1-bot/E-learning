<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = 'cours';

    protected $fillable = [
    'formation_id',
    'title',
    'description',
    'content',
    'file_path',
    'video_path',
    'video2_path',
    'video_url',
    'order',
];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}