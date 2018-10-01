<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input ;
use File;
use Auth;

class QuestionController extends Controller
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
        $Question = Question::all();
        return response()->json($Question);    
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
    'title' => 'required|unique:questions|max:255',
    'category_id' => 'required|exists:categories,_id',
    'sub_category_id' => 'required|exists:sub_categories,_id',
    'difficulty' => 'required|max:255',



]);

if ($validator->fails()) {
           return response()->json($validator->errors()->all(), 422); 
   
}

///////////////////////////////////////////////////////////////////////////////////////////
if (isset($request->answer)) {


foreach ($request->answer as $key => $value) {
    
     $answer[$key]['answer']=$value;
     if(isset($request->true_answer[$key])){
        $true=1;
     $answer[$key]['true_answer']=$request->true_answer[$key];
}else{

    $answer[$key]['true_answer']=0;
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


}
        $all['title']=$request->title;
        $all['category_id']=$request->category_id;
        $all['sub_category_id']=$request->sub_category_id;
        $all['difficulty']=$request->difficulty;
        $all['status']=1;
        $question = new Question($all);
        $question->save();
        foreach ($answer as $key => $value) {
                $question->answers()->create($value);

        }

        return response()->json($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $e = Question::where('_id',$id)->orderBy("updated_at","desc")->get();
          return response()->json($e);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
    'title' => 'required|unique:questions|max:255',
    'category_id' => 'required|exists:categories,_id',
    'sub_category_id' => 'required|exists:sub_categories,_id',
    'difficulty' => 'required|max:255',



            ]);

            if ($validator->fails()) {
                       return response()->json($validator->errors()->all(), 422); 
               
            }

            ///////////////////////////////////////////////////////////////////////////////////////////
            if (isset($request->answer)) {

            foreach ($request->answer as $key => $value) {
                
                 $answer[$key]['answer']=$value;
                 if(isset($request->true_answer[$key])){
                    $true=1;
                 $answer[$key]['true_answer']=$request->true_answer[$key];
            }else{

                $answer[$key]['true_answer']=0;
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


            }
                    $all['title']=$request->title;
                    $all['category_id']=$request->category_id;
                    $all['sub_category_id']=$request->sub_category_id;
                    $all['difficulty']=$request->difficulty;
                    $all['status']=1;

                    $question = Question::find($id);
                    $question->fill($all);
                    $question->save();
                    $question->answers()->delete();

                    foreach ($answer as $key => $value) {
                            $question->answers()->create($value);

                    }

                    return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Question::find($id);
       if($e->status==1){
            $suspend['status']=0;
        } else         $suspend['status']=1;

        $e->fill($suspend);
            $e->save(); 
               return response()->json($e);

    }
    public function Questiondelete($id)
    {
        $e = Question::find($id);
             $e->delete();

      
    }
  public function Questionfilter(Request $request)
    {
        $Question = Question::query();


        if(isset($request->category_id) ){
                            
                $Question = $Question->where('category_id', $request->category_id);
      
            } 
        if(isset($request->sub_category_id) ){
                            
                $Question = $Question->where('sub_category_id', $request->sub_category_id);
      
            } 
     if(isset($request->title) ){
                            
                $Question = $Question->where('title',"like","%".$request->title."%");
      
            } 
   if(isset($request->difficulty) ){
                            
                $Question = $Question->where('difficulty',$request->difficulty);
      
            }     
                $Question = $Question->get();
        return response()->json($Question);    
    }
}
