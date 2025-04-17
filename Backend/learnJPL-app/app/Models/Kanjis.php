<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kanjis extends Model
{

    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'character',
        'meaning',
        'onyomi',
        'kunyomi',
        'strokes',
        'example'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }
}
