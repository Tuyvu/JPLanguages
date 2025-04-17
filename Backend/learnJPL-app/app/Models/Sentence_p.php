<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sentence_p extends Model
{
    protected $fillable = [
        'lesson_id',
        'pattern',
        'usage',
        'example'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }
}
