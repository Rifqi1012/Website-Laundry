<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataLogin extends Authenticatable
{
    use Notifiable;

    protected $table = 'data_login';
    protected $fillable = ['username', 'password'];

}

