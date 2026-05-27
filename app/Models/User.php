<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'rol',
        'carnet',
        'celular',
        'gmail',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function esAdmin(): bool
    {
        return $this->rol === 'admin';
    }
}