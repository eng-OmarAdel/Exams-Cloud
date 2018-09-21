<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function createquestion(){
        return view('pages.createquestion');
    }
    public function questions(){
        return view('pages.questions');
    }
}
