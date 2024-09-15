<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = ['password'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
