<?php

namespace App;



use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;

use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
/*class User extends Eloquent {


}*/
/*
class User extends Authenticatable
{
    use Notifiable;

 
    protected $fillable = [
        'name', 'email', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];
}*/