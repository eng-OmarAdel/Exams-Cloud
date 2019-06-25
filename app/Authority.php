<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Authority extends Eloquent
{
    protected $fillable = [
        'name', 'created_at','created_by','updated_at',
    ];
    
}
