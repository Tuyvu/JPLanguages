<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lessons extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','course_id', 'content', 'video_url', 'order'];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
    public function conversations() {
        return $this->hasMany(Conversation::class);
    }
    
    public function vocabularies() {
        return $this->hasMany(Vocabulary::class);
    }
    
    public function sentencePatterns() {
        return $this->hasMany(SentencePattern::class);
    }
    
    public function kanjis() {
        return $this->hasMany(Kanji::class);
    }
   
}
