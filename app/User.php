<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'email', 'type', 'password', 'username', 'phone', 'status', 'email_token', 'verified', 'full_name', 'package_id',

    ];
     public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {

        return $this->hasOne('App\Student', 'user_id');

    }

    public function school()
    {

        return $this->hasOne('App\Organization', 'user_id');

    }

    public function company()
    {

        return $this->hasOne('App\Organization', 'user_id');

    }

    public function organization()
    {

        return $this->hasOne('App\Organization', 'user_id');

    }

    public function sendPasswordResetNotification($token)
{
    $this->notify(new PasswordReset($token));
}


}
