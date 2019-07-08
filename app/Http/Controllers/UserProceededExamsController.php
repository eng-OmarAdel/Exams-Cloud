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
        $question=$exam->questions()->where("status","suspended")->pluck("_id");
        $countSuspended=$question->count();
        $question=$question->toArray();


       foreach ($r as $key => &$value) {
            $count= 0;
            foreach ($value->ExamCorrection as $key2 => $value2) {
                if(in_array($value2['question'],$question)){
                    continue;
                }
               if($value2['is_true']=="yes"){
                $count++;
               }
            }
            $total=$value->ExamCorrection()->count()-$countSuspended;
            $value['mark']=$count."/".$total ;
       }   
        return datatables()->of($r)->toJson();


    }

    public function ViewAnswers(Request $request)
    {
        //for auth user
        $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'categoryName' => function($q) {
            $q->select('name');
        }
            ])->find($request->exam_id);
        $r=$exam->Examtries()->where("user_id",Auth::id())->where("_id",$request->_id)->first();
        return response()->json(array("data"=> $exam,"r"=> $r['ExamCorrection']));
         


    }

    public function ViewAnswersByUserID(Request $request)
    {
        //for auth user
        $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'categoryName' => function($q) {
            $q->select('name');
        }
            ])->find($request->exam_id);
        $r=$exam->Examtries()->where("user_id",$request->user_id)->where("_id",$request->_id)->first();
        return response()->json(array("data"=> $exam,"r"=> $r['ExamCorrection']));
         


    }



    public function report(Request $request)
    {
        $exam=Exam::find($request->ExamId);
        $question=$exam->questions()->where("_id",$request->qId)->first();

        $reported_before=Report::where(array("exam_id"=>$request->ExamId ,"exam_question_id"=>$request->qId ,"user_id"=>Auth::user()->id  ))->count();

        if($reported_before){
            return response()->json("you reported this question before", 422);

        }
        Report::create(array("exam_id"=>$request->ExamId ,"question_id"=>$question->question_id ,"exam_question_id"=>$request->qId ,"user_id"=>Auth::user()->id ,"status"=>"pending" ,"reason"=>$request->reason));
        $this->getExamReport($request->ExamId,$request->qId);
        $this->suspendQuestion($question->question_id);
        return "Successfully reported";

    }

    public function getExamReport($exam_id,$question_id)
    {
        $exam=Exam::find($exam_id);
        //number of exam tries per exam groupby user id
        $examTries=$exam->Examtries()->groupBy('user_id')->count();

        if($examTries>12){
                //reports per question in an exact exam 
                $count = Report::where("exam_question_id",$question_id)->count();
                $reportsRatio=$count/$examTries;
                    if($reportsRatio>=0.6){
                        $question = $exam->questions()->find($question_id);
                        $question['status']="suspended";
                        $question->save();
                    }       
        }

    }
    public function suspendQuestion($question_id){

        $question=Question::find($question_id);

        $exams_ids=$question->QuestionExam()->pluck("exam_id");
        $exams = Exam::whereIn("_id",$exams_ids)->get();

        $examTries=0;
        foreach ($exams as $key => $value) {
            $examTries+=$value->Examtries()->groupBy('user_id')->count();
        }

        if($examTries>12){

                    $count = Report::where("question_id",$question_id)->count();
                    $reportsRatio=$count/$examTries;
                        if($reportsRatio>=0.6){
                            $question['status']="suspended";
                            $question->save();
                            foreach ($exams as $key => $value) {
                                $x=$value->questions()->where("question_id",$question_id)->first();
                                $x->status = "suspended";
                                $x->save();
                            }
                        }
        }

        
    }

}
