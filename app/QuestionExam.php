<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class QuestionExam extends Eloquent
{


    protected $fillable = [

        'exam_id',
    
    ];
}
