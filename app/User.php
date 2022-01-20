<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    protected $fillable = [
        'firstname','secondname','email','password','company_id','type','code','email_confirmed','actived','iscontact','deleted',
    ];

    protected $hidden = [
        'password',
    ];
}
