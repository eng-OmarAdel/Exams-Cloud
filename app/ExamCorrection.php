<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ExamCorrection extends Eloquent
{


    protected $fillable = [
         'question', 'is_true', 'answer'
    ];



}
