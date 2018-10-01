<?php

namespace App\Http\Controllers;

use     Carbon\Carbon;
use App\Category;
use App\SubCategory;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;
use Illuminate\Support\Facades\DB;
use View;
use function view;
class AdminController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     $this->type = Auth::User()->type;
        //     if($this->type!=1){
        //     abort(404, 'Unauthorized action.');
        //     }
        //     return $next($request);

        // });

    }

    public function view(Request $request) {


        $Category=Category::where("status",1)->get();
        $SubCategory=SubCategory::where("status",1)->get();
        $u = Auth::User();
        $view = $request->view;
        if ($view == null || $view == '') {
          $view = 'dashboard';
        }else if(!view()->exists("backend/".$view)){
          abort(404, 'Unauthorized action.');
        }
        
        return view("backend/".$view)
                        ->with("page", $view)
                        ->with("categories", $Category)
                        ->with("subcategories", $SubCategory)

                        ->with("user", $u);
    }


}