<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "admins";

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'active',
        'date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}