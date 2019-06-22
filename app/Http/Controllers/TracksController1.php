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

class TracksController1 extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {   $id=$request->id;
        $authority = Authority::where('_id', $id)->first();
        $categories = [];
        $children = [];
        //$tracks = [];

        if(!$authority){
          $rootCategory = Category::where('name', 'root')->where('level','-1')->first();
          $rootTrack  = Track::where('_id', $id)->first();
          $GLOBALS['authid'] = $rootTrack['auth_id'];
        }
        else{
          $GLOBALS['authid'] = $id;
          $rootCategory = Category::where('name', 'root')->where('level','-1')->first();
          $rootTrack  = Track::where('name', 'root')->where('level',-1)->first();
        }


        // echo($GLOBALS['id']);
        // return;
        if(isset($rootTrack->child_ids)){
          foreach ($rootTrack->child_ids as $child_id) {
              $children[] = Track::where("_id",$child_id)->where('auth_id',$rootTrack['auth_id'])->first();
            }
        }

        if(isset($rootTrack->cats_id)){
            foreach ($rootTrack->cats_id as $child_id) {
                $children[] = Category::where("_id",$child_id)->first();
              }
          }

        //self::category_traverse_recursive($rootCategory , $categories , $id);
        //self::track_traverse_recursive($rootTrack , $tracks,$id);
        //return $tracks;

        //return datatables()->of($tracks)->toJson();
        return datatables()->of($children)->toJson();
        // return view("common.AuthProfile", ["authority" => $authority,"tracks" => $tracks]);
    }

    // category table data


    public function category_traverse_recursive($tree_node , &$objects , $id){
        $objects[]=$tree_node;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Category::find($child_id);

            self::category_traverse_recursive($child,$objects,$id);
        }
        return ;
    }

    // end category table data

    // track table data

    public function track_traverse_recursive($tree_node,&$objects,$id){
        if(isset($tree_node->child_ids))
{
        $objects[]=$tree_node;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Track::where("_id",$child_id)->where('auth_id',$id)->where('level',0)->first();
            self::track_traverse_recursive($child,$objects,$id);
        }
    }
        return ;
    }

    // end track table data




    /* Categories select options */

    public function category_traverse_recursive1($tree_node , &$options){
        $node_options = "";
        // if ($tree_node->level != "-1" ){
            $node_options .= "<option value =' " . $tree_node->_id . "'>";
        // }
        for($j = 0 ; $j < $tree_node->level ; $j++)
        {
            $node_options.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $node_options .= $tree_node->name . "</option>";
        $options.=$node_options;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Category::find($child_id);
            self::category_traverse_recursive1($child,$options);
        }
        return ;
    }

    public function travesre_for_options()
    {
        $root = Category::where('name', 'root')->where('level','-1')->first();
        $root_opts = "";
        self::category_traverse_recursive1($root , $root_opts);
        return response()->json($root_opts);
    }


    // end Categories select options



    // Tracks select options

    public function track_traverse_recursive1($tree_node , &$options,$id){
        if(isset($tree_node->_id)){
        $node_options = "";
        //echo("tree_node ".$tree_node->name."\n");
        // if ($tree_node->level != "-1" ){
            $node_options .= "<option value =' " . $tree_node->_id . "'>";

        // }
        for($j = 0 ; $j < $tree_node->level ; $j++)
        {
            $node_options.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $node_options .= $tree_node->name . "</option>";
        $options.=$node_options;
        foreach ($tree_node->child_ids as $child_id) {
            $child = Track::where("_id",$child_id)->where('auth_id',$id)->first();
            //echo("child ".$child->name."\n");
            //return;
            self::track_traverse_recursive1($child,$options,$id);
        }}
        return ;
    }

    public function travesre_for_options1(Request $request)
    {
        $root = Track::where('name', 'root')->where('level',-1)->first();
        $root_opts = "";
        self::track_traverse_recursive1($root , $root_opts,$request->id);
        return response()->json($root_opts);
    }

    // end Tracks select options



    public function store(Request $request)
    {
        if($request->type=="track"){
            $validator = Validator::make($request->all(), [
                'name'        => 'required|max:255',
                'auth_id' => 'max:255',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }
            $id = $request->parentTrack;
            $parent = new Track();
            $authority = Authority::where('_id', $id)->first();

            if(!$authority){
            $parent = Track::where('_id', $id)->first();
            }
            else{
            $parent = Track::where('auth_id', $id)->where('name','root')->first();
            //dd($parent);
            }


            $request['parent_id'] = $parent['_id'];
            $request['level'] = $parent['level'] + 1;
            $request['auth_id'] = $parent['auth_id'];
            $request['child_ids'] = [];
            $new_track = new Track();
            $new_track->fill($request->all());
            $new_track->save();
            //updating parent
            $childs = $parent->child_ids;
            $childs[] = $new_track->_id;
            $parent->child_ids = $childs;
            $parent->save();
            //
            return response()->json($new_track);
        }elseif($request->type=="category")
        {
            $parentID = $request->parentTrack;
            $parent = Track::where('_id', $parentID)->first();

            // in case the category is not found
            

           
            $request['parent_id'] = '5cacb5fcf34cdb15b5657de9';
            $request['level'] = 0;
            $request['child_ids'] = [];
            $new_category = new Category();
            $new_category->fill($request->all());
            $new_category->save();


            $root = Category::where('name', 'root')->where('level','-1')->first();
            $rootchilds = $root->child_ids;
            //dd($new_category->id);
            $rootchilds[] = $new_category->id;
            $root->child_ids = $rootchilds;
            $root->save();


            $cats = $parent->cats_id;
            $cats[] = $new_category->id;
            $parent->cats_id = $cats;
            $parent->save();
            return response()->json($new_category);

        }
    }




}
