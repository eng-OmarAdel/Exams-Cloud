<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tag extends Eloquent
{
    protected $fillable = [
        'tag'
    ];
}
