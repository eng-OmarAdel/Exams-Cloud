<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Track extends Eloquent
{
    protected $fillable = [
        'name','parent_id','auth_id','level','child_ids','created_at',
    ];
}
