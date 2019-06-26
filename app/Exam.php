<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Exam extends Eloquent
{


    protected $fillable = [
        'ownerID', 'category', 'track', 'tags', 'duration', 'difficulty','is_published','page_type', 'questions', 'created_at', 'updated_at',
    ];

    public function questions()
    {
        return $this->embedsMany('App\Question');
    }
    public function Examtries()
    {
        return $this->embedsMany('App\ExamTries');
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
        return $this->belongsTo('App\Track',"track");
    }
    public function categoryName()
    {
        return $this->belongsTo('App\Category',"category");
    }
}
