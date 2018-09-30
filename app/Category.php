<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent {


protected $fillable=["title","status"];
    public function sub()
    {
        return $this->hasMany('App\SubCategory',"category_id");
    }
}
    

