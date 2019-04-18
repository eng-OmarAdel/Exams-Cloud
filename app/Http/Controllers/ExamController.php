<?php
namespace App\Http\Controllers;
use App\Question;
use Illuminate\Http\Request;
class ExamController  extends Controller
{
    //

    public function create(Request $request){
    
        $questions= Question::take(1)->where('is_programming','=','no')->skip(rand(0,14))->take(10)->get();
        return view('common.exam' ,compact('questions'));
        
    }


    public function result(Request $request){
        Question::find($request['questions1']);
        
        echo count($request->all());
        //return $request->all();
        $c= count($request->all())-2;
         //$request->all();
         //echo $request[$request['questions'.strval(1)]];
         for ($i=1; $i<=$c;$i++)
         {
            
             
            if($request['questions'.strval($i)])
            echo $request[$request['questions'.strval($i)]];
            
         }

        
    }
}