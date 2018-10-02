<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Exam extends Eloquent {
protected $fillable=['difficulty','category_id','sub_category_id','user_id'];

	   public function responses()
    {
        return $this->embedsMany('App\Response');
    }
	public function category()
    {
        return $this->belongsTo('App\Category');
    }
	public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }

}
/*class question extends Model
{
    //
}*/
