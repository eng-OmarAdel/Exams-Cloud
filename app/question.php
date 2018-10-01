<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Question extends Eloquent {
protected $fillable=['title','category_id','sub_category_id','difficulty','status'];

	   public function answers()
    {
        return $this->embedsMany('App\Answer');
    }

}
/*class question extends Model
{
    //
}*/
