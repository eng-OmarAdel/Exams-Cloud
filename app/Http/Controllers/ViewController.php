<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ViewController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');


    }

    public function view(Request $request)
    {




        $u = Auth::user();

        $view = $request->view;

        $main="backend";//main folder

/******* if every user type has a folder we can change their folder from this if statment***/
        // if(Auth::user()->type="something"){
        //   $main=  "somethingELse";
        // }
        
/*****************************************************************************************
* check the view request parameter if exists in the main folder stored in $main variable
* if not it will see the common folder else it will give an error  
******************************************************************************************/        
        if ($view == null || $view == '') {
            $view = 'Home-page';
        } 
        if (view()->exists($main."/".$view)) {
            $view=$main."/".$view;
        } else if (view()->exists("common/".$view)) {
            $view="common/".$view;
        }else{
            abort(404, 'Unauthorized action.');
        }
/********************************************************************************************/

        return view($view)
            ->with("page", $view)
            ->with("user", $u);
    }

}

