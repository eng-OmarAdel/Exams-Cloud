<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SubCategory extends Eloquent {

protected $fillable=["title","category_id","status"];

}
    

