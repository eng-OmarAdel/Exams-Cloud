<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Answer extends Eloquent {

protected $fillable=['answer','true_answer'];

}
/*class question extends Model
{
    //
}*/
