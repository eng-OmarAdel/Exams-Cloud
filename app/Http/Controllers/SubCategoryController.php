<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SubCategory;
use App\Question;
use Validator;
use Illuminate\Support\Facades\Input ;
use File;


class SubCategoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checktype');

          
    }

    
    public function index()
    {
        $SubCategory = SubCategory::all();
 
      foreach ($SubCategory as  $s => $Companys) {
                $Sector = Sector::find($Companys['category_id']);
if (isset($Sector->title)) {
   $SubCategory[$s]['category_id']=$Sector->title;
}
         }

        return response()->json($SubCategory);    
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
                        'title' => 'required|unique:sub_categories|max:255',
                        'category_id' => 'required|exists:categories,_id',
                    ]);
                   
                    if ($validator->fails()) {
                               return response()->json($validator->errors()->all(), 422); 
                        }

         $e = new SubCategory();
         $all=$request->all();
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
          $e = SubCategory::where("_id" ,$id)->first()->toArray();
          return response()->json($e);
    }
 public function update(Request $request, $id)
    {
                $validator = Validator::make($request->all(), [
                        'title' => 'required|unique:sub_categories|max:255',
                        'category_id' => 'required|exists:categories,_id',
                    ]);
                   
                    if ($validator->fails()) {
                               return response()->json($validator->errors()->all(), 422); 
                        }

        $e = SubCategory::where("_id" ,$id)->first();
        $e->fill($request->all());
        $e->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = SubCategory::where("_id" ,$id)->first();
       if($e->status==1){
            $suspend['status']=0;
        } else         $suspend['status']=1;

        $e->fill($suspend);
            $e->save(); 
               return response()->json($e);

    }
    public function SubCategorydelete($id)
    {

$q=Question::where("sub_category_id",$id)->first();

    if(isset($q->_id))
        return response()->json("there is question(s) related to this sub-category", 422); 
    else{
        $e = SubCategory::where("_id" ,$id)->first();
             $e->delete();
        }
      

    }

        public function SubCategory2($id)
    {
         $e=SubCategory::where('category_id',$id)->get();


          return response()->json($e);

    }

}
