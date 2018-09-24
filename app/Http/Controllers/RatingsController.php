<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\Rating;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ratings_save($id)
    {
       // $qsts = question::all();
        $question =  question::first();
        print_r($question->ratings()->first());die; 
        $question->ratings = [["rate"=> "5"],["rate"=> "8"],["rate"=> "9"]];
        $question->save();

    }

  
 
}
