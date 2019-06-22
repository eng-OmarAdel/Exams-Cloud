<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Exam extends Eloquent
{


    protected $fillable = [
        'ownerID', 'authorityID', 'trackID', 'tags', 'duration', 'difficulty', 'questions', 'created_at', 'updated_at',
    ];

    public function questions()
    {
        return $this->embedsMany('App\Question');
    }

    public function tags()
    {
        return $this->embedsMany('App\Tag');
    }
    public function authorityName()
    {
        return $this->belongsTo('App\Authority',"authorityID");
    }
    public function trackName()
    {
        return $this->belongsTo('App\Track',"trackID");
    }

}
