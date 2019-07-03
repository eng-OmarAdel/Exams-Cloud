<?php

namespace App\Http\Controllers;

use Auth;
use App\Exam;
use App\User;
use App\Report;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class UserProceededExamsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function UserProceededExams(Request $request)
    {
       $user = User::find(Auth::user()->_id);
        $r=$user->UserExams;
       foreach ($r as $key => &$value) {
        $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'categoryName' => function($q) {
            $q->select('name');
        }
            ])->find($value->exam_id);
        $value['title']=$exam->title;

        if(isset($exam->categoryName->name)){
                $value['cat']=$exam->categoryName->name;
        }else{
                $value['cat']="";
        }
        if(isset($exam->trackName->name)){
                $value['track']=$exam->trackName->name;
        }else{
                $value['track']="";
        }
        $value['submited']=$exam->Examtries()->where("user_id",Auth::id())->count();

       }   

        return datatables()->of($r)->toJson();


    }
    public function SubmittedExams(Request $request)
    {
        $exam = Exam::find($request->_id);
        $r=$exam->Examtries()->where("user_id",Auth::id());

       foreach ($r as $key => &$value) {
            $count= 0;
            foreach ($value->ExamCorrection as $key2 => $value2) {
               if($value2['is_true']=="yes"){
                $count++;
               }
            }

            $value['mark']=$count."/".$value->ExamCorrection()->count() ;
       }   
        return datatables()->of($r)->toJson();


    }

    public function ViewAnswers(Request $request)
    {
        $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'categoryName' => function($q) {
            $q->select('name');
        }
            ])->find($request->exam_id);
        $r=$exam->Examtries()->where("user_id",Auth::id())->where("_id",$request->_id)->first();
        return response()->json(array("data"=> $exam,"r"=> $r['ExamCorrection']));
         


    }

    public function report(Request $request)
    {
        $exam=Exam::find($request->ExamId);
        $question=$exam->questions()->where("_id",$request->qId)->first();

        $reported_before=Report::where(array("exam_id"=>$request->examId ,"exam_question_id"=>$request->qId ,"user_id"=>Auth::user()->id  ))->count();

        if($reported_before){
            return "you reported this question before";
        }
        Report::create(array("exam_id"=>$request->examId ,"question_id"=>$question->question_id ,"exam_question_id"=>$request->qId ,"user_id"=>Auth::user()->id ,"status"=>"pending" ));
        return "Successfully reported";

    }
}
