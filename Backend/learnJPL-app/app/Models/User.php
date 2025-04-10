<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'role_id',
        'address'
    ];
    public function userCourses()
    {
        return $this->hasMany(User_courses::class, 'user_id');
    }
    public function userTests()
    {
        return $this->hasMany(User_tests::class, 'user_id');
    }

    public function countCourses(): int
    {
        return $this->userCourses()->count();
    }

    public function averageScore(): float
    {
        return round($this->userTests()->avg('score') ?? 0, 2);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
