<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;
use App\Authority;
use App\Track;
use Illuminate\Http\Request;
use Validator;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;
class ExamController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
      if($request['cat_type']=="1"){
        $exams = Exam::orderBy("updated_at")->with(['trackName' => function($q) {
           $q->select('name');
       },'authorityName' => function($q) {
           $q->select('name');
       }
           ])->where('catID',$request['cat_id'])->get();
      }else{
        $exams = Exam::orderBy("updated_at")->with(['trackName' => function($q) {
           $q->select('name');
       },'authorityName' => function($q) {
           $q->select('name');
       }
           ])->where('trackID',$request['cat_id'])->get();
      }

        return datatables()->of($exams)->toJson();
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
                // 'Authority'    => 'required',
                // 'title'    => 'required',
                // 'tags'    => 'required',
                // 'Track'    => 'required',
                // 'timeLimit' => 'required',
                // 'Category' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore= new Exam();
            //$examToStore["authorityID"]=$request["Authority"];
            $examToStore["title"]=$request["title"];
            $examToStore["ownerID"]=Auth::id();
            $examToStore["timeLimit"]=$request["timeLimit"];
            if($request['cat_type'] == '1'){
                $examToStore["catID"]=$request["cat_id"];
            }else{
                $examToStore["trackID"]=$request["cat_id"];
            }
            $examToStore->save();
            $all = $request->all();
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
             $tags = $examToStore->tags()->create(['tag' =>$value]);
            }

            return response()->json($examToStore);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($id);

        return response()->json($exam);

    }

    public function showQuestions($id)
    {
         $exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($id);
            $questions = $exam['questions'];
        return datatables()->of($questions)->toJson();

    }
    public function addQuestionToExam($request){
      $e=Question::where('_id',$request->question_id)->first();
      $exam=Exam::where('_id',$request->exam_id)->first();

        $examQuestions = $exam->questions()->create([
          'track'=> $e['track'],
          'status'=> $e['status'],
          'is_programming'=> $e['is_programming'],
          'name'=> $e['name'],
          'exam_id'=> $e['exam_id'],
          'updated_at'=> $e['updated_at'],
          'created_at'=> $e['created_at'],
        ]);
        foreach ($e['answers'] as &$value) {
            $exam->questions()->last()->answers()->create(['answer' => $value['answer'], 'is_true' => $value['is_true']]);
        }
        foreach ($e['tags'] as $key => $value) {
            $exam->questions()->last()->tags()->create(['tag' => $value]);
        }
    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
              // 'Authority'    => 'required',
              // 'title'    => 'required',
              // 'tags'    => 'required',
              // 'Track'    => 'required',
              // 'timeLimit' => 'required',
              // 'Category' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore=  Exam::where("_id",$id)->first();
            //Check if the size of ExamTries[0] isset else return edit is closed because exam is published

            //$examToStore["authorityID"]=$request["Authority"];
            $examToStore["title"]=$request["title"];
            $examToStore["ownerID"]=Auth::id();
            $examToStore["timeLimit"]=$request["timeLimit"];
            if($request['cat_type'] == '1'){
                $examToStore["catID"]=$request["cat_id"];
            }else{
                $examToStore["trackID"]=$request["cat_id"];
            }
            $examToStore->save();
            $all = $request->all();
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
             $tags = $examToStore->tags()->create(['tag' =>$value]);
            }

    }


    public function destroy($id)
    {
        Exam::where('_id', $id)->delete();
    }

    //You need to add questions to the exam




}
