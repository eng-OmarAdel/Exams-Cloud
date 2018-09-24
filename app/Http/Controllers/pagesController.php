<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
class pagesController extends Controller
{
    public function index(){
               $qsts =   question::orderBy('created_at' , 'desc')->limit(4)->get();
        return view('home')->with('questions', $qsts);

    }

    public function createquestion(){
        return view('pages.createquestion');
    }

    public function questions(){
        return view('pages.questions');
    }

    public function mcq()
    {
        return view('questions.mcq');
    }

    public function simple()
    {
        return view('questions.simple');
    }

    public function tf()
    {
        return view('questions.tf');
    }

}
