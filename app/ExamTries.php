<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ExamTries extends Eloquent
{


    protected $fillable = [
        'user_id',
         // 'question', 'is_true'
    ];

        public function ExamCorrection()
    {
        return $this->embedsMany('App\ExamCorrection');
    }


}
