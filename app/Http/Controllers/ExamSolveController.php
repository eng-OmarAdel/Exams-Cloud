<?php

namespace App\Http\Controllers;

use Auth;
use App\Exam;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ExamSolveController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {

        $Exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($request->_id)    ;

        return response()->json($Exam);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $Exam = Exam::find($request->exam_id);

        $answered = array();
        foreach($Exam['questions'] as $question){

            if ($question->is_programming=="no"){
            if($question->type=="choose"){
                if(isset($request["answer"][$question["_id"]])){
                        $true_answer= $question->answers()->where("is_true",1)->first();
                    if($request["answer"][$question->_id]==$true_answer->_id){
                        $is_true="yes";

                    }else{
                        $is_true="no";
                    }
                    $answer=$request["answer"][$question["_id"]];
                }else{
                    $is_true="no";
                    $answer=""; 
                }
            }else if($question->type=="complete"){

                    $answers=$question->answers()->get();
                    $answer="";
                    $true="";
                    $count = 0;
                    foreach ($request->complete[$question["_id"]] as  $value) {

                        $answer.=$answers[$value]->answer."(@)";
                        $true.=$answers[$count]->answer."(@)";
                        $count++;

                    }
                    $is_true = ($answer == $true)? "yes":"no";
            }
            }else{
                $output = $this->compiler($request["answer"][$question->_id]."",$question->programming_language);
                $true_answer= $question->answer_id;
                if($output==$true_answer){

                    $is_true="yes";
                }else{
                    $is_true="no";
                }
                $answer=$request["answer"][$question->_id]."";
            }
            array_push($answered,["question"=>$question->_id,"is_true"=> $is_true,"answer"=>$answer]);

        }
     
        $author = $Exam->Examtries()->create(["user_id"=>Auth::user()->_id]);
        foreach ($answered as $key => $value) {
            $author->ExamCorrection()->create($value);
        }

    }

    function compiler($code,$language){

        $client = new \GuzzleHttp\Client();
        $URI = 'http://134.209.204.108/testsob72.tk/compiler/index.php';
        $params['headers'] =  ['Content-Type' => 'application/x-www-form-urlencoded'];

        $params['form_params'] = array('answer' => $code, 'extension' => $language);
         $response = $client->post($URI, $params);

        return json_decode($response->getBody())->data;
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        Question::where('_id', $id)->delete();
    }
    public function proceed(Request $request)
    {
        $user=User::find(Auth::user()->_id);
        $exam = $user->UserExams()->where("exam_id", $request->exam_id)->first();
        if(isset($exam->exam_id)){
                $exam->count +=1;
                $exam->save();
        }else
        {
            $exam = $user->UserExams()->create(['exam_id' => $request->exam_id, "count"=> 1]);
        }
    }


}
