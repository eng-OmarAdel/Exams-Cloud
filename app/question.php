<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Exam extends Eloquent
{


	public function answers()
    {
        return $this->embedsMany('App\Answer');
    }

    public function tags()
    {
        return $this->embedsMany('App\Tag');
    }
    protected $fillable = [
        'name',  'category', 'type','user_id',  'weight','exam_id','answer_id', 'is_programming','status', 'created_at','updated_at',
    ];
}
