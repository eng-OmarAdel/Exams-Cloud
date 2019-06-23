<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SolvedQuestion extends Eloquent
{
    

    protected $fillable = [
        'question_id',
            'user_answer',
            'true_answer',
            'is_true'
    ];

}
