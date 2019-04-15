<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Category;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function track_traverse_recursive($tree_node , &$options){
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
            self::track_traverse_recursive($child,$options);
        }
        return ;
    }

    public function index()
    {
        $categories = [];
        $root = Category::where('name', 'root')->where('level','-1')->first();
        self::object_traverse_recursive($root , $categories);

        foreach ($categories as $track){
            if(isset($track))
            {
            if ($track->level == '-1')
                    continue;

        for ($i = 0; $i < $track->level; $i++){
            $track->name="--".$track->name;
                }
            }
    }
        return datatables()->of($categories)->toJson();
        //return view("common.Category", ["categories"=>$categories]);
    }

    public function object_traverse_recursive($tree_node , &$objects){
        $objects[]=$tree_node;
        
        if(isset($tree_node)){
        foreach ($tree_node->child_ids as $child_id) {
            $child = Category::find($child_id);
            self::object_traverse_recursive($child,$objects);
        }
        return ;
        }
    }

    public function travesre_for_options()
    {
        $root = Category::where('name', 'root')->where('level','-1')->first();
        $root_opts = "";
        self::track_traverse_recursive($root , $root_opts);
        return response()->json($root_opts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:255|unique:categories',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }

        $parentID = $request->parentCategory;
        $parent = Category::where('_id', $parentID)->first();

        $request['parent_id'] = $parent['_id'];
        $request['level'] = $parent['level'] + 1;
        $request['child_ids'] = [];
        $new_category = new Category();
        $new_category->fill($request->all());
        $new_category->save();
        //updating parent
        $childs = $parent->child_ids;
        $childs[] = $new_category->_id;
        $parent->child_ids = $childs;
        $parent->save();
        //
        return response()->json($new_category);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $Category = Category::where('_id', $id)->first();
         
        return response()->json($Category);

    }

    public function deleteElement($element, &$array){
        $index = array_search($element, $array);
        if($index !== false){
            unset($array[$index]);
        }
        return $array;
    }

    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }

            // Get the category id
            $Category = Category::where('_id', $id)->first();
           
            // Remove the category id from the parents child_ids
            $oldParentID = $Category->parent_id;
            $oldParent = Category::where('_id', $oldParentID)->first();
            $oldChilds = $oldParent->child_ids;
            $oldChilds = self::deleteElement($id,$oldChilds);
            $oldParent->child_ids = $oldChilds;
            $oldParent->save();
            //echo $oldChilds;

            // Delete the category
            Category::where('_id', $id)->delete();


            $validator = Validator::make($request->all(), [
                'name'        => 'required|max:255',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);
            }
    
            $parentID = $request->parentCategory;
            $parent = Category::where('_id', $parentID)->first();
            
            
            $request['parent_id'] = $parent['_id'];
            $request['level'] = $parent['level'] + 1;
            $request['child_ids'] = [];
            $new_category = new Category();
            $new_category->fill($request->all());
            $new_category->save();
            //updating parent
            $childs = $parent->child_ids;
            $childs[] = $new_category->_id;
            $parent->child_ids = $childs;
            $parent->save();
}


    public function destroy($id)
    {
        // $validator = Validator::make($request->all(), [
            
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors()->all(), 422);

        // }

        $Category = Category::where('_id', $id)->first();
        $parentID = $Category->parent_id;
        $parent = Category::where('_id', $parentID)->first();
        $oldChilds = $parent->child_ids;
        $oldChilds = self::deleteElement($id,$oldChilds);
        $parent->child_ids = $oldChilds;
        $parent->save();
        Category::where('_id', $id)->delete();
    }

    

}
