<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exam;
use App\Track;
use App\SolvedQuestion;
use App\Report;
use App\Question;
use App\User;
use Auth;
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
                if(isset($request->exam_id)){
                    $exam = Exam::find($request->exam_id);
                    $questions= $exam->questions()->where("status","active")->toArray();
                }else{
                    $questions = Question::where("category",$cat_id)->where("status","active")->orderBy("id")->with('tags')->get();

                }
        }
        else if ($cat_type == "2") {
                            if(isset($request->exam_id)){
                    $exam = Exam::find($request->exam_id);
                    $questions= $exam->questions()->where("status","active")->toArray();
                }else{
                    $questions = Question::where("track",$cat_id)->where("status","active")->orderBy("id")->with('tags')->get();

                }
            
        }
        foreach ($questions as $key => &$value1) {
                $value1['mytags']="";
                if(isset($value1['tags'])){
            foreach ($value1['tags'] as &$value) {
                $value1['mytags'] .= $value['tag'] . ",";
            }
            $value1['mytags'] = rtrim($value1['mytags'], ",");
}
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
        //profanity;
        $res =  self::isOffensive($request->name);
        while(!($res=='offensive' | $res=='not_offensive' )){
            $res =  self::isOffensive($request->name);
        }
        if($res != "not_offensive"){
            return response()->json(["This question has OFFENSIVE words!!"], 422);
        }
        //=================================
        // dd($request->all());
        if ($request->is_programming == "no") {
            //not programming validation code
            
            if(Question::noneProgValidation($request)!=1){
                return  response()->json(Question::noneProgValidation($request), 422);
            }
            if($request->type=="choose"){

                $is_dup = self::isDuplicate($request->name , $request->answer[array_keys($request->is_true)[0]]);
                    if($is_dup === "duplicate"){
                        return response()->json(["This question is a Duplicate"], 422);
                }  
            }
      
            //answer
            foreach ($request->answer as $key => $value) {
                $answer[$key]['answer'] = $value;
                if (isset($request->is_true[$key])) {
                    $answer[$key]['is_true'] = 1;
                } else {
                    $answer[$key]['is_true'] = 0;
                }
            }
     

            $all = $request->all();
            if($request->cat_type == "1"){
            $cat=  Category::find($request->cat_id);
               if(isset($cat->_id)){
                $all['category'] = $request->cat_id;
            }else{
                return response()->json(["the category is invalid"], 422);
            }
            }
            else{
                $track= Track::find($request->cat_id);
               if(isset($track->_id)){
                $all['track'] = $request->cat_id;
                }else{
                    return response()->json(["the track is invalid"], 422);
                }
            }
            $all['status'] = "active";
            $all['user_id']=Auth::user()->_id;

            unset($all['answer_id']);// for only programming output
            
            if(isset($request->exam_id)){
                $exam = Exam::find($request->exam_id);
                $e= $exam->questions()->create($all);
                }else{
                    $e =Question::create($all);

                }
            foreach ($answer as &$value) {
                $Answers = $e->answers()->create(['answer' => $value['answer'], 'is_true' => $value['is_true']]);
            }
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' => $value]);
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
            if($request->cat_type == "1"){
            $cat=  Category::find($request->cat_id);
               if(isset($cat->_id)){
                $all['category'] = $request->cat_id;
            }else{
                return response()->json(["the category is invalid"], 422);
            }
            }
            else{
                $track= Track::find($request->cat_id);
               if(isset($track->_id)){
                $all['track'] = $request->cat_id;
                }else{
                    return response()->json(["the track is invalid"], 422);
                }
            }
            $all['status'] = "active";
            $all['user_id']=Auth::user()->_id;

            if(isset($request->exam_id)){
                $exam = Exam::find($request->exam_id);
                $e= $exam->questions()->create($all);
                }else{
                    $e =Question::create($all);

                }
            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' => $value]);
            }
        }
        // saving question to the bank in case of exam
        if(isset($request->exam_id)){

            $new_q = $e->replicate();
            $new_q->save();
            $e->question_id = $new_q->id;
            $e->save();
            $new_q->QuestionExam()->create(['exam_id' => $request->exam_id]);

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
            $pos = strpos($id, "&exam_id=");
            if(!$pos){
                $Question = Question::where('_id', $id)->with("answers")->with("tags")->first();

            }else{
                $exam_id= substr($id, $pos+9);
                $id=substr($id,0,$pos);
                $exam= Exam::find($exam_id);
                $Question=$exam->questions()->where('_id', $id)->first();
            }


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
        //profanity;
        $res =  self::isOffensive($request->name);
        while(!($res=='offensive' | $res=='not_offensive' )){
            $res =  self::isOffensive($request->name);
        }
        if($res != "not_offensive"){
            return response()->json(["This question has OFFENSIVE words!!"], 422);
        }
        //=================================
        // dd($request->all());
        if ($request->is_programming == "no") {
            //not programming validation code
            
            if(Question::noneProgValidation($request)!=1){
                return  response()->json(Question::noneProgValidation($request), 422);
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
            if(isset($request->exam_id)){
                $exam = Exam::find($request->exam_id);
                $pos = strpos($id, "&exam_id=");
                $id=substr($id,0,$pos);
                $e= $exam->questions()->where("_id", $id)->first();
                }else{
                    $e = Question::where("_id", $id)->first();

                }
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $e->status = "active";
            $all = $request->all();
            unset($all['answer_id']);// for only programming output
            $e->fill($all);
            $e->save();

            $e->answers()->delete();
            foreach ($e->tags()->get() as $key => $value) {
                 $value->delete();
            }
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
            if(isset($request->exam_id)){
                $exam = Exam::find($request->exam_id);
                $pos = strpos($id, "&exam_id=");
                $id=substr($id,0,$pos);
                $e= $exam->questions()->where("_id", $id)->first();
                }else{
                    $e = Question::where("_id", $id)->first();

                }
            if($request->cat_type == "1"){
                $e->category = $request->cat_id;
            }
            else{
                $e->track = $request->cat_id;
            }
            $all['status'] = "active";
            $e->fill($all);
            $e->save();
            $e->tags()->delete();

            $pieces = explode(",", $all['tags']);
            foreach ($pieces as $key => $value) {
                $tags = $e->tags()->create(['tag' => $value]);
            }
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
            if($e->type=="choose"){
            $myanswer_id = $request->answer;
            $myanswer_obj = $e->answers()->where("_id", $myanswer_id)->first();
            $myanswer = $myanswer_obj->answer;
            $true = $e->answers()->where("is_true", 1)->first()->answer;
            $is_true = $myanswer_obj->is_true;
            }else if($e->type=="complete"){
                    $answers=$e->answers()->get();
                    $myanswer="";
                    $true="";
                    $count = 0;
                    foreach ($request->complete as  $value) {

                        $myanswer.=$answers[$value]->answer."(@)";
                        $true.=$answers[$count]->answer."(@)";
                        $count++;

                    }
                    $is_true = ($myanswer == $true)? 1:0;

            }
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


    public function isOffensive($target_question)
    {
        $URI = 'http://134.209.204.108/profanity_check?target='.$target_question;
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
        // \"oddensive\"
        // \"not_offensive\"
        $response = preg_replace("/[\"]/", "", $response);
        return $response;
        // oddensive
        // not_offensive
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
