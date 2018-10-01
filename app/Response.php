<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Response extends Eloquent {
protected $fillable=['question_id','answer_id',"status"];



}
/*class question extends Model
{
    //
}*/
