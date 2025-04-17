<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id','speaker','content'];

    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }
}
