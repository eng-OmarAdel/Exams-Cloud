<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;

class UserExams extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'exam_id','count'

    ];
  
  public function Exams()
    {
        return $this->belongsTo('App\Exam',"exam_id");
    }

}
