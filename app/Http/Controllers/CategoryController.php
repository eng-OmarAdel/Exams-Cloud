<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\User;
use App\Question;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
//use Jenssegers\Mongodb\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;

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

    

    public function index(Request $request)
    {
        // $user = $request->user();
        // echo $user;
        // return;
        $id=$request->id;
        
        if(!isset($id))
        {
            $id = '5cacb5fcf34cdb15b5657de9';
        }
        // dd($id);
        // echo $id;
        // return;
        $categories = [];
        //commented temporary $questions = Question::where('category', $id)->get();
        // dd(count($questions));
        // dd($questions);
        // return;
        $root = Category::where('_id', $id)->first();
        self::object_traverse_recursive($root , $categories);
        $cats = [];
        foreach ($categories as $track){
            if(isset($track))
            {
            // if ($track->level == '-1')
            //         continue;
            
            if($track->level == $root->level + 1)
            {
                $cats[] = $track;
            }
            // $cats[] = $questions;
            //commented temporary $quests = $questions->toArray();
            //commented temporary $result = array_merge($cats, $quests);
            $result = $cats;
            }
    }
        return datatables()->of($result)->toJson();
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
            'name'        => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }

        if($request->type=="category")
        {
            $parentID = $request->parentCategory;
            $parent = Category::where('_id', $parentID)->first();
            $user = $request->user();
            //echo $user['email'];
            //return;
            $request['created_by'] = $user['email'];
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
        elseif($request->type=="question") 
        {
            $validator = Validator::make($request->all(), [
            'name'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);
        }
        if($request->is_programming=="no"){
            foreach ($request->answer as $key => $value) {
                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {

                // $isDuplicate=$this->isDuplicate( $request->name , $value );
                // if($isDuplicate==1)
                // return response()->json(["This question is a Duplicate"], 422);

                    $true                    = 1;
                    $answer[$key]['is_true'] = $request->is_true[$key];
                } else {

                    $answer[$key]['is_true'] = 0;
                }
            }

            foreach ($answer as $key => $value) {
                $validator = Validator::make($value, [
                    'answer' => 'required|max:255',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors()->all(), 422);
                }
            }
            if (!isset($true)) {
                return response()->json(["Please enter at least one true answer."], 422);
            }
            $catID = $request->category;
            $all = $request->all();
            if (isset($request->answer)) {
                $e = new Question();
                $all['status']="approved";
                $user = $request->user();
                //echo $user['email'];
                //return;
                $all['created_by'] = $user['email'];
                $all['status']="approved";
                $e->fill($all);
                $e->save();
                foreach ($answer as &$value) {
                    $Answers = $e->answers()->create(['answer' =>$value['answer'],'is_true' =>$value['is_true']]);
                }
                $pieces = explode(",", $all['tags']);
                foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' =>$value]);
                }
            }
            }else{
                    $all = $request->all();
                    $e = new Question();
                    $user = $request->user();
                    //echo $user['email'];
                    //return;
                    $all['created_by'] = $user['email'];
                    $all['status']="approved";
                    $e->fill($all);
                    $e->save();
                    return response()->json($e);
            }
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //     if(!isset($id))
    //     {
    //         $id = '5cacb5fcf34cdb15b5657de9';
    //     }
    //     //dd($id);
    //     // echo $id;
    //     // return;
    //     $categories = [];
    //     $root = Category::where('_id', $id)->first();
    //     self::object_traverse_recursive($root , $categories);
    //     $cats = [];
    //     foreach ($categories as $track){
    //         if(isset($track))
    //         {
    //         // if ($track->level == '-1')
    //         //         continue;
            
    //         if($track->level == $root->level + 1)
    //         {
    //             $cats[] = $track;
    //         }

    //     // for ($i = 0; $i < $track->level; $i++){
    //     //     $track->name="--".$track->name;
    //     //         }
    //         }
    // }
    //     return datatables()->of($cats)->toJson();

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


        $user = \Auth::user();
        $Category = Category::where('_id', $id)->first();
        if($user['email'] == $Category['created_by'])
        {
            $parentID = $Category->parent_id;
            $parent = Category::where('_id', $parentID)->first();
            $oldChilds = $parent->child_ids;
            $oldChilds = self::deleteElement($id,$oldChilds);
            $parent->child_ids = $oldChilds;
            $parent->save();
            Category::where('_id', $id)->delete();
        }
    }

    public function CategoryParents($id)
    {
        $items = [];
        $item = Category::find($id);
        $items[] = $item;
        while($item->name !== "root"){
            $id = $item->parent_id;
            $item = Category::find($id);
            $items[] = $item;
        }
        $items = array_reverse($items);
        return json_encode($items);
    }

}
