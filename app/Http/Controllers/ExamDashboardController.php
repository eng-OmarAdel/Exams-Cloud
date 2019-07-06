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

}
