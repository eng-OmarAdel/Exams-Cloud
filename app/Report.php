<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Report extends Eloquent
{

    protected $fillable = [
        'exam_id',
        'question_id',
        'exam_question_id',
        'user_id',
        'status', 'created_at','updated_at',
    ];
}
