<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Answer extends Eloquent
{


    protected $fillable = [
        'answer', 'is_true', 'created_at','updated_at',
    ];
    
}
