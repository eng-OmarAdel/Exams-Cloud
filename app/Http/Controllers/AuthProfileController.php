<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Track;
use App\Authority;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
use Illuminate\Support\Facades\DB;

class AuthProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request, $id)
    {
        $GLOBALS['id'] = $id;
        $categories = [];
        $tracks = [];
        $rootTrack = Category::where('name', 'root')->where('level','-1')->first();
        $authority = Authority::where('_id', $id)->first();
        self::category_traverse_recursive($rootTrack , $categories);
        return view("common.AuthProfile", ["categories"=>$categories,"authority" => $authority]);
    }

    public function category_traverse_recursive($tree_node , &$objects){
        $objects[]=$tree_node;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Category::find($child_id);
            self::category_traverse_recursive($child,$objects);
        }
        return ;
    }

    public function track_traverse_recursive($tree_node , &$objects){
        $objects[]=$tree_node;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Category::find($child_id);
            self::track_traverse_recursive($child,$objects);
        }
        return ;
    }

}
