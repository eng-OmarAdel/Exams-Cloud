<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;
use App\Category;
use App\Authority;
use App\Track;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ExamController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {
        $exams = Exam::orderBy("updated_at")->with(['trackName' => function($q) {
           $q->select('name');
       },'authorityName' => function($q) {
           $q->select('name');
       }
           ]);
        if($request->cat_type=="1"){
            $exams=$exams->where("category",$request->cat_id)->get();
        }else{
            $exams=$exams->where("track",$request->cat_id)->get();

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
                'title'    => 'required',
                'tags'    => 'required',
                'duration'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore= new Exam();


            $examToStore["page_type"]=$request["page_type"];
            $examToStore["duration"]=$request["duration"];
            $examToStore["is_published"]=0;
            if($request->cat_type == "1"){
               $cat=  Category::find($request->cat_id);
               if(isset($cat->_id)){
                $examToStore['category'] = $request->cat_id;
            }else{
                return response()->json(["the category is invalid"], 422);
            }
            }
            else{

                $track= Track::find($request->cat_id);
               if(isset($track->_id)){
                $examToStore['track'] = $request->cat_id;
                }else{
                    return response()->json(["the track is invalid"], 422);
                }
            }
            $examToStore["title"]=$request["title"];
            $examToStore["ownerID"]=Auth::id();
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
        $exam  = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($id);
                if(isset($exam['tags'])){
            foreach ($exam['tags'] as &$value) {
                $exam['mytags'] .= $value['tag'] . ",";
            }
            $exam['mytags'] = rtrim($exam['mytags'], ",");
}
        
        return response()->json($exam);

    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'title'    => 'required',
                'tags'    => 'required',
                'duration'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }
////////////////////////////////////////////////////////////////////////////
            $all=$request->all();
            $examToStore=  Exam::where("_id",$id)->first();
            $examToStore["title"]=$request["title"];
            $examToStore["duration"]=$request["duration"];
            $examToStore["page_type"]=$request["page_type"];
            $examToStore->tags()->delete();
            $examToStore->save();
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
             $tags = $examToStore->tags()->create(['tag' =>$value]);
            }

    }


    public function destroy($id)
    {
        Exam::where('_id', $id)->delete();
    }
    
    
    public function publish_unpublish($id)
    {
        $exam = Exam::find($id);
        $exam->is_published = 1 - $exam->is_published;
        $exam->save();
        return json_encode(['is_published'=>$exam->is_published]);
    }

    public function add_existing_question(Request $request)
    {
        $exam = Exam::find($request->exam_id);
        foreach ($request->existing_questions as $q_id) {
            $q = Question::find($q_id);
            $q->exam_id = $request->exam_id;
            $q->save();
            $q['question_id'] = $q_id;
            $exam->questions()->associate($q);
            $q->QuestionExam()->create(['exam_id' => $request->exam_id]);
        }
        $exam->save();
        return redirect()->back();
    }

}
