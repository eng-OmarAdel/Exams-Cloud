<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
	    public function subs()
    {
        return $this->embedsMany('App\Category');
    }

    protected $fillable = [
        'name', 'level','parent_id','child_ids', 'created_at','updated_at',
    ];
}
