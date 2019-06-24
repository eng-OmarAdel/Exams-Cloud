<?php

namespace App\Http\Controllers;

use App\Category;
use App\Track;
use App\SolvedQuestion;
use App\Question;
use App\User;
use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class QuestionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {
        $cat_id = $request->cat_id;
        $cat_type = $request->cat_type;
        if ($cat_type == "1"){
            $questions = Question::where("category",$cat_id)->orderBy("id")->with('tags')->get();
        }
        else if ($cat_type == "2") {
            $questions = Question::where("track",$cat_id)->orderBy("id")->with('tags')->get();
        }
        foreach ($questions as $key => &$value1) {
            foreach ($value1['tags'] as &$value) {
                $value1['mytags'] .= $value['tag'] . ",";
            }
            $value1['mytags'] = rtrim($value1['mytags'], ",");
        }
        return datatables()->of($questions)->toJson();
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);
        }
        // dd($request->all());
        if ($request->is_programming == "no") {
        //not programming
            $is_dup = self::isDuplicate($request->name , $request->answer[array_keys($request->is_true)[0]]);
            if($is_dup === "duplicate"){
                return response()->json(["This question is a Duplicate"], 422);
            }

            //answer
            foreach ($request->answer as $key => $value) {
                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {
                    $found_true_ans = 1 ;
                    $answer[$key]['is_true'] = 1;
                } else {
                    $answer[$key]['is_true'] = 0;
                }
            }
            if (!isset($found_true_ans)) {
                return response()->json(["Please enter at least one true answer."], 422);
            }
            $e = new Question();
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $e->status = "approved";
            $all = $request->all();
            unset($all['answer_id']);// for only programming output
            $e->fill($all);
            $e->save();
            foreach ($answer as &$value) {
                $Answers = $e->answers()->create(['answer' => $value['answer'], 'is_true' => $value['is_true']]);
            }
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' => $value]);
            }
            if(isset($request->exam_id)){
              $exam=Exam::where('_id',$request->exam_id)->first();
              $examQuestions = $exam->questions()->create([
                '_id' => $e['_id'],
                'track'=> $e['track'],
                'status'=> $e['status'],
                'is_programming'=> $e['is_programming'],
                'name'=> $e['name'],
                'exam_id'=> $e['exam_id'],
                'updated_at'=> $e['updated_at'],
                'created_at'=> $e['created_at'],
                'answers'=> $e['answers'],
                'tag' => $e['tags']
              ]);
              //$examQuestions[] = $e;
              //unset($exam->question);
              //$exam->question = $examQuestions;
              //$exam->save();
            }

        } else {
            // programming
            // $is_dup = self::isDuplicate($request->name , $request->answer_id);
            // if($is_dup === "duplicate"){
            //     return response()->json(["This question is a Duplicate"], 422);
            // }
            /** Not working
             * api need to be smarter to detect a programming question
             * programming_language -> (php | py | cpp | c)
             * correct answer will be in answer_id directly
             */
            $all = $request->all();
            $e = new Question();
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $all['status'] = "approved";
            $e->programming_language = $request->program_language;
            $e->fill($all);
            $e->save();
            if(isset($request->exam_id)){
              $exam=Exam::where('_id',$request->exam_id)->first();
              $examQuestions = $exam->questions()->create($e);
              //$examQuestions[] = $e;
              //unset($exam->question);
              //$exam->question = $examQuestions;
              //$exam->save();
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $Question = Question::where('_id', $id)->with("answers")->with("tags")->first();
        $tags = "";
        foreach ($Question['tags'] as $value) {
            $tags .= $value['tag'] . ",";
        }
        $tags = rtrim($tags, ",");
        unset($Question['tags']);
        $Question['tags'] = $tags;
        return response()->json($Question);

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);
        }
        // dd($request->all());
        if ($request->is_programming == "no") {
        //not programming

            //answer
            foreach ($request->answer as $key => $value) {
                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {
                    $found_true_ans = 1 ;
                    $answer[$key]['is_true'] = 1;
                } else {
                    $answer[$key]['is_true'] = 0;
                }
            }
            if (!isset($found_true_ans)) {
                return response()->json(["Please enter at least one true answer."], 422);
            }
            $e = Question::where("_id", $id)->first();
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $e->status = "approved";
            $all = $request->all();
            unset($all['answer_id']);// for only programming output
            $e->fill($all);
            $e->save();
            foreach ($answer as &$value) {
                $Answers = $e->answers()->create(['answer' => $value['answer'], 'is_true' => $value['is_true']]);
            }
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' => $value]);
            }

        } else {
            // programming
            $all = $request->all();
            $e = Question::where("_id", $id)->first();
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $all['status'] = "approved";
            $e->programming_language = $request->program_language;
            $e->fill($all);
            $e->save();
        }
    }


    public function destroy($id)
    {
        Question::where('_id', $id)->delete();
    }

    public function category(Request $request)
    {
        $result = Category::get();
        return response()->json($result);
    }


    public function Correct(Request $request, $id)
    {
        // return response()->json($request->all());
        $e = Question::where("_id", $id)->first();
        if ($e->is_programming == "Yes") {
            //my answer compiled:
            $intrnal_req = new Request();
            $intrnal_req->code = $request->answer;
            $intrnal_req->extension = $e->programming_language;
            $myanswer = json_decode(self::ExecuteCode( $intrnal_req))->result;
            //true answer
            $true = (string)$e->answer_id;
            $is_true = ($true == $myanswer)? 1:0;
        }
        else {
            //not programming
            $myanswer_id = $request->answer;
            $myanswer_obj = $e->answers()->where("_id", $myanswer_id)->first();
            $myanswer = $myanswer_obj->answer;
            $true = $e->answers()->where("is_true", 1)->first()->answer;
            $is_true = $myanswer_obj->is_true;
        }

        //saving to db
        $me = User::find(auth()->user()->id);
        $solved_question = [
            'question_id' => $e->_id,
            'user_answer' => $myanswer,
            'true_answer' => $true,
            'is_true' => $is_true
        ];
        $me->solved_questions()->create($solved_question);
        // returning it back to front end
        return json_encode($solved_question);
    }

    public function isDuplicate($target_question, $target_answer)
    {
        $URI = 'http://134.209.204.108/duplication?target='.$target_question."(@)".$target_answer;
        $URI = preg_replace("/ /", "%20", $URI); //very fucking important
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $URI,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        // "true" -> not duplicate
        // "duplicated entry" -> duplicate
        if($response === "true"){
            return "not_duplicate";
        }
        return "duplicate";
    }

    public function ExecuteCode(Request $request) {
        $extension = $request->extension;
        $code = $request->code;
        $client = new \GuzzleHttp\Client();
        $URI = 'http://134.209.204.108/testsob72.tk/compiler/index.php';
        $params['headers'] =  ['Content-Type' => 'application/x-www-form-urlencoded'];
        $params['form_params'] = array('answer' => $code, 'extension' => $extension);
        $response = $client->post($URI, $params);
        $data = json_decode($response->getBody())->data;
        return json_encode([
            'result' => $data
        ]);
    }

}


// save it for now (compiler)
        // function compiler($code,$language){
        //     $client = new \GuzzleHttp\Client();
        //     $URI = 'http://134.209.204.108/testsob72.tk/compiler/index.php';
        //     $params['headers'] =  ['Content-Type' => 'application/x-www-form-urlencoded'];

        //     $params['form_params'] = array('answer' => $code, 'extension' => $language);
        //      $response = $client->post($URI, $params);

        //     return json_decode($response->getBody())->data;
        // }
