<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Authority extends Eloquent
{
    protected $fillable = [
        'name','track' ,'category','status', 'created_at','updated_at',
    ];
}
