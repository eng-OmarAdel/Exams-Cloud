<?php

namespace App\Http\Controllers;

use App\Question;
use App\Category;
use App\Answer;
use App\CodeExec;
use Illuminate\Http\Request;
use Validator;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
class QuestionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $questions['aaData'] = Question::orderBy("id")->with('tags')->get();

        foreach ($questions['aaData'] as $key => &$value1) {
            foreach ($value1['tags'] as  &$value) {
                $value1['mytags'].=  $value['tag'].",";
            }
            $value1['mytags'] = rtrim($value1['mytags'], ",");
        }

        return response()->json($questions);
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
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
if($request->is_programming=="no"){
            foreach ($request->answer as $key => $value) {

                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {

                $isDuplicate=$this->isDuplicate( $request->name , $value );
                if($isDuplicate==1)
                return response()->json(["This question is a Duplicate"], 422);

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

        

        $all = $request->all();
//////////////////////////////////////////////////////////////////////////
        if (isset($request->answer)) {
            $e = new Question();
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
            $all['status']="approved";

            $e->fill($all);
            $e->save();
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
         $Question = Question::where('_id', $id)->with("answers")->with("tags")->first();
         $tags="";
         foreach ($Question['tags'] as  $value) {
            $tags.=  $value['tag'].",";
                     }
        $tags = rtrim($tags, ",");
            unset($Question['tags']);
            $Question['tags']=$tags;
        return response()->json($Question);

    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
if($request->is_programming=="no"){

            foreach ($request->answer as $key => $value) {

                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {
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

        

        $all = $request->all();
//////////////////////////////////////////////////////////////////////////
        if (isset($request->answer)) {
            $e =  Question::where("_id",$id)->first();
            $e->answers()->delete();
            $e->tags()->delete();
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

            $e =  Question::where("_id",$id)->first();
            $all['status']="approved";

            $e->fill($all);
            $e->save();
    }
    }


    public function destroy($id)
    {
        Question::where('id', $id)->delete();
    }

    public function category(Request $request) { $result = Category::get();
    return response()->json($result); }


    public function Correct(Request $request,$id) { 
            $e =  Question::where("_id",$id)->first();
            if($e->is_programming=="Yes"){
                $true=  (string)  $e->answer_id;
                $myanswer=  (string)  $request->e;;



                $result = strcmp($true,$myanswer);

                if($result==0){

                    return "success";
                }else{
                    return $myanswer;
                }

            }else{
                $myanswer=$request->answer;;
                $answer= $e->answers()->where("_id",$myanswer)->first();
                    if($answer->is_true=="1"){
                        return "success";
                    }else{
                        return "you choosed the wrong answer";
                    }
            }

}
    public function isDuplicate($target_question , $target_answer )
    { 
        


           $fp = fopen('C:/Users/Leno/Desktop/examCloud/duplicateInput.txt', 'w');
        $count = Question::where("is_programming","no")->count();

        $rem=$count;
        $limit=5;
        $sssss="";
        for($i =0; $i<$count  ; $i=$i+5)
        {
            
            
            $skip = $i;
            if($rem < $limit )
            {
                $limit = $rem;
            }
            $rem -= $limit;
            $data = Question::skip($skip)->take($limit)->where("is_programming","no")->get();
            //             return $data."\r\n";

            // $count222 = Question::skip($skip)->take($limit)->count();
            // return $count222."\r\n";
            //This variable containe n of row

            for($a =0; $a<$limit ; $a++)
            {
                
                $question=$data[$a]['name'];
                for($k=0; $k<4 ; $k++)
                {
                        if(isset($data[$a]['answers'][$k]['is_true'])){
                    if($data[$a]['answers'][$k]['is_true']== 1)
                    {
                         $answer= $data[$a]['answers'][$k]['answer'];
                    }
                    
                }
                }
                $sssss.=$question."(@)".$answer."(@)";
  
               

            }
           $sssss=$target_question."(@)".$target_answer."(@)".$sssss;

            fwrite($fp, $sssss);
            fclose($fp);

            $result= "C:/Users/Leno/AppData/Local/Programs/Python/Python37/python C:/Users/Leno/Desktop/examCloud/presentation.py 2>&1";
               exec($result, $output, $return_var);
               return $result=$output[2];
           // return view("welcome " , compact('data'));
           if($result==1)
               {
                
                return "true";
                //return view("welcome " , compact('data'));
               }
               
           // $fp = fopen('C:/Users/Leno/Desktop/examCloud/duplicateInput.txt', 'w');
           // fwrite($fp, $target_question."(@)");
           //      fwrite($fp, $target_answer."(@)");
           // fclose($fp);
        }
 
        
        
        return "false";
         //return view("welcome " , compact('data'));
    }

}
