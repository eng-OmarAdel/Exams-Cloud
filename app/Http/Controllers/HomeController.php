<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Authority;
use App\Track;
use App\Category;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        
        return view("common.Home");
    }
}