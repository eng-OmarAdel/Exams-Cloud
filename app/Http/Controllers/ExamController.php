<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;
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
           ])->get();
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
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }


////////////////////////////////////////////////////////////////////////////
            $examToStore= new Exam();


            $examToStore["authorityID"]=$request["Authority"];
            $examToStore["page_type"]=$request["page_type"];
            $examToStore["is_published"]=0;
            $examToStore["trackID"]=$request["Track"];
            $examToStore["title"]=$request["title"];
            //$examToStore["ownerID"]=Auth::id();
            $examToStore["ownerID"]="5c97ebff2ace521b10006e02";
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
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'title'    => 'required',
                'tags'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }
////////////////////////////////////////////////////////////////////////////
            $all=$request->all();
            $examToStore=  Exam::where("_id",$id)->first();
            $examToStore["title"]=$request["title"];
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

 



}
