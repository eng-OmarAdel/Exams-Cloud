<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class rating extends Eloquent {

   public function question()
    {
        return $this->embedsOne('question');
    }

}
