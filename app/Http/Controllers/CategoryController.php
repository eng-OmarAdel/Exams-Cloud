<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input ;
use File;
use Auth;

class CategoryController extends Controller
{
   

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checktype');

          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $Category = Category::all();
        return response()->json($Category);    
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
    'title' => 'required|unique:categories|max:255',
]);
if ($validator->fails()) {
           return response()->json($validator->errors()->all(), 422); 
   
}

        $e   = new Category();
        $all = $request->all();
        $all['status']=1;
        $e->fill($all);
        $e->save();
        return response()->json($e);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $e = Category::where('_id',$id)->get();
          return response()->json($e);
    }
    public function update(Request $request, $id)
    {
                $validator = Validator::make($request->all(), [
                        'title' => 'required|unique:categories|max:255',
                    ]);
                   
                    if ($validator->fails()) {
                               return response()->json($validator->errors()->all(), 422); 
                        }


        $e   = Category::find($id);
        $all = $request->all();
        $e->fill($all);
        $e->save();
        return response()->json($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Category::find($id);
       if($e->status==1){
            $suspend['status']=0;
        } else         $suspend['status']=1;

        $e->fill($suspend);
            $e->save(); 
               return response()->json($e);

    }
    public function Categorydelete($id)
    {

$q=Question::where("category_id",$id)->first();

    if(isset($q->_id))
        return response()->json("there is question(s) related to this category", 422); 
    else{

        Category::find($id)->sub()->delete();
        Category::find($id)->delete();

    }

      
    }

}
