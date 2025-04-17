<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vocabularies extends Model
{
    protected $fillable = [
        'lesson_id',
        'word',
        'meaning',
        'pronunciation',
        'example_sentence'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }
}
