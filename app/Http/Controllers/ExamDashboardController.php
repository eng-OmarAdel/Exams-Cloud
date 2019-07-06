<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;
use App\User;
use App\Category;
use App\Authority;
use App\Track;
use App\Report;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ExamDashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam_id = $id;
        $questions = Exam::find($exam_id)->questions()->toArray();
        //counting rejected and pending reports
        foreach ($questions as $key => $q) {
            $rejected_reports =  Report::where("exam_id", $exam_id)->where("exam_question_id",$q["_id"])->where("status",'rejected')->count();
            $questions[$key]['rejected_reports_count']=$rejected_reports;
            $pending_reports =  Report::where("exam_id", $exam_id)->where("exam_question_id",$q["_id"])->where("status",'pending')->count();
            $questions[$key]['pending_reports_count']=$pending_reports;
        }
        return datatables()->of($questions)->toJson();

    }
    public function update(Request $request, $id)
    {

          
    }


    public function destroy($id)
    {
       
    }

    public function get_exam_question_reports($exam_id, $question_id){
        //data table of exam question reports
        $reports=Report::where('exam_id', $exam_id)->where('exam_question_id' , $question_id)->get()->toArray();
        $can_reject_or_accept = 0;
        foreach ($reports as $key => $r) {
            $reports[$key]['username'] = User::find($r['user_id'])->full_name;
            if($r["status"]==='pending'){
                $can_reject_or_accept = 1;
            }
        }
        $data = datatables()->of($reports)->toArray();
        $data['can_reject_or_accept'] = $can_reject_or_accept;
        return response()->json($data);
    }
 
    public function accept_report($exam_id,$question_id){
        $exam = Exam::find($exam_id);
        $exam_question = $exam->questions()->where('_id',$question_id)->first();
        $orig_question = Question::find($exam_question->question_id);
        $current_user = auth()->user()->id;
        //check if he is the owner of original question
        if($current_user == $orig_question->user_id){
            //suspend the questions' bank
            $orig_question->status = 'suspended';
            $orig_question->save();
        }
        $exam_question->status = 'suspended';
        $exam_question->save();
        // make report status accepted
        $reports=Report::where('exam_id', $exam_id)->where('exam_question_id' , $question_id)->get();
        foreach ($reports as $report) {
            $report->status = "accepted";
            $report->save();
        }
        return response()->json(['status'=>'success']);
    }

    public function reject_report($exam_id,$question_id){
        $reports=Report::where('exam_id', $exam_id)->where('exam_question_id' , $question_id)->get();
        foreach ($reports as $report) {
            $report->status = "rejected";
            $report->save();
        }
        return response()->json(['status'=>'success']);
    }
    public function charts(Request $request){

        $Exam=Exam::find($request->_id);
        $activeQuestions=$Exam->questions()->where("status","active")->pluck("_id");
        $suspendedQuestions=$Exam->questions()->where("status","!=","active")->pluck("_id");
        $examTries=$Exam->Examtries;
        
        //no of Participants 
        $Participants=$Exam->Examtries()->groupBy("user_id")->count();

        //no Trials 
        $noOfTrials=$Exam->Examtries->count();
        //no of exam active questions
        $noOfActiveQuestions=count($activeQuestions);
        //no of exam suspended questions
        $noOfSuspendedQuestions=count($suspendedQuestions);

        $trueTrials =0;
        $falseTrials =0;
    
        foreach ($examTries as $key => $value) {
            //no of questions solved as true 
            $trueTrials+=$value->ExamCorrection()->whereIn("question",$activeQuestions)->where("is_true","!=","no")->count();
            //no of questions solved as false 
            $falseTrials+=$value->ExamCorrection()->whereIn("question",$activeQuestions)->where("is_true","no")->count();

            foreach ($value->ExamCorrection as $key2 => $value1) {
                if(in_array($value1->question,$suspendedQuestions->toArray())){
                    $true[$value1->question]="suspended";
                    $false[$value1->question]="suspended";
                    continue;
                }
                if(!isset($true[$value1->question])){
                    $true[$value1->question]=0;
                }
                if(!isset($false[$value1->question])){
                    $false[$value1->question]=0;
                }
                $true[$value1->question] = ($value1->is_true=="yes") ? $true[$value1->question]+1:$true[$value1->question];
                $false[$value1->question]= ($value1->is_true=="no") ? $false[$value1->question]+1:$false[$value1->question];
            }

        }
        $MarksDistribution=$this->MarksDistribution($request->_id);
        $array= array(
            "trueTrials"=>$trueTrials,//no of questions solved as true 
            "falseTrials"=>$falseTrials,//no of questions solved as false
            "noOfTrials"=>$noOfTrials, //no of Trials 
            "noOfActiveQuestions"=>$noOfActiveQuestions,//no of questions solved as true
            "noOfSuspendedQuestions"=>$noOfSuspendedQuestions,//no of questions solved as false
            "Participants"=>$Participants,//no of Participants 
            "MarksDistribution"=>$MarksDistribution,//no of Marks Distribution 
            "questionsRatio"=>array("true"=>$true,"false"=>$false)//each question answers  
        );
        return response()->json($array);

    }
    public function UsersExamined(Request $request)
    {   
        $Exam=Exam::find($request->_id);
        $Participants=$Exam->Examtries()->pluck("user_id")->unique();
        $user=User::whereIn("_id",$Participants)->get();

        foreach ($user as $key => &$value) {
            $value["count"]=$value->UserExams()->where("exam_id",$request->_id)->first()->count;
            $value["submitedTries"]=$Exam->Examtries()->where("user_id",$value->_id)->count();

        }

        return datatables()->of($user)->toJson();
    }

    public function UserMarks (Request $request){


        $exam = Exam::find($request->exam_id);
        $r=$exam->Examtries()->where("user_id",$request->user_id);
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
    public function MarksDistribution ($exam_id){


        $exam = Exam::find($exam_id);
        $r=$exam->Examtries()->get();
        $question=$exam->questions()->where("status","suspended")->pluck("_id");
        $countSuspended=$question->count();
        $question=$question->toArray();

            $marks["<0.2"]=0;
            $marks["<0.4"]=0;
            $marks["<0.6"]=0;
            $marks["<0.8"]=0;
            $marks["<1"]=0;
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
            $value['mark']=$count/$total ;

            if($value['mark']<=0.2){
                $marks["<0.2"]++;
            }elseif($value['mark']<=0.4){
                $marks["<0.4"]++;
            }elseif($value['mark']<=0.6){
                $marks["<0.6"]++;
            }elseif($value['mark']<=0.8){
                $marks["<0.8"]++;
            }else{
                $marks["<1"]++;
            }
       }   
       return $marks;

    }

}
