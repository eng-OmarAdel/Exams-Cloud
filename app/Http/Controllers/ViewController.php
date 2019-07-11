<?php

namespace App\Http\Controllers;
use App\Category;
use App\Question;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ViewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');


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
            $view = 'common/Home-page';
            /******* Homepage data  ******/
            // $question_top = Question::groupBy("category")->get();
            $question_top =  DB::table('questions')->raw( function ( $collection ) {
                return $collection->aggregate([
                    [
                        '$group' => [
                            '_id' =>  '$category'
                        ,
                        'count' => ['$sum' => 1],
                        ],
                    ],
                    [
                        '$sort' => [
                            'count'=> -1
                        ],
                    ],
                    [
                        '$limit' => 4
                    ],

                ]);
            })->toArray();
            // dd($question_top);
            $categories = [];
            foreach ($question_top as $key => $value) {
                $category = Category::find($value->_id);
                $category->questions = Question::where("category",$value->_id)->orderBy("updated_at","desc")->limit(3)->get();
                $categories[] = $category;
            }
            // dd($categories);
             
             /****************************/
            return view($view)
            ->with("categories", $categories)
            ->with("page", $view)
            ->with("user", $u);
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

