<?php
namespace App\Http\Controllers;

use App\Question;
use App\Category;
use App\SubCategory;
use App\Exam;
use App\Answer;
use App\Response;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input ;
use File;
use Auth;
use DB;

/**
 * toDo:
 * identify status values [0/1]
 */

class ExamController extends Controller
{
    public function welcome() {
        $cats = Category::all();
        return view('frontend.exam.welcome',compact(
            'cats'
        ));
    }


    public function generate(Request $request) {

        // question props: title','category_id','sub_category_id','difficulty','status'

        $category_id = $request['category_id'];
        $sub_category_id = $request['sub_category_id'];
        $difficulty = strtolower($request['difficulty']);
        //dd($category_id, $sub_category_id, $difficulty);
        $exam = new Exam();
        $exam->category_id = $category_id;
        $exam->sub_category_id = $sub_category_id;
        $exam->user_id = auth()->user()->id;
        $exam->difficulty =$difficulty;

        //dd($exam);
        
        $ques = Question::raw(function($collection) use ($category_id,$sub_category_id,$difficulty)
            {
                return $collection->aggregate([
                    [
                        '$match' => [
                            'category_id' => "$category_id",
                            'sub_category_id' => "$sub_category_id",
                            'difficulty' => "$difficulty",
                            'status' => 1
                        ]
                    ],
                    [
                        '$sample' => ['size' => 10]
                    ]
                ]); //note: aggregate overrides previous filtering if was in laravel style
            })
            ->pluck('_id')->all();//array of ques' ids

        //dd($ques);

        if(count($ques)){
            foreach ($ques as $q){
                $response = new Response();
                $response->question_id = $q;
                $response->answer_id = 0;
                $exam->responses()->associate($response);
            }
            $exam->save();
            //dd ($exam->_id);
            return redirect("exam/$exam->_id/$ques[0]/1");    
        }

        return redirect()->back()->with(['msg'=>'no questions match your filters']);
    }

    public function take($e_id , $q_id, $count)
    {
        $exam = Exam::find($e_id);
        $question = Question::find($q_id);
        $total = count($exam->responses);
        return view('frontend.exam.take',compact(
            'exam',
            'question',
            'count',
            'total'
        ));
    }

    public function answer(Request $request)
    {
        //dd($request->all());
        $exam = Exam::find($request->e_id);
        //dd($exam);
        $response = $exam->responses()->where('question_id',$request->q_id)->first();
        //dd($response);
        $response->answer_id = $request->answer_id;
        $response->save();

        $count= $request->count + 1;
        $total = $request->total;
        if($count <= $total){
            /**
             * Important:
             * if any answer id is NULL it will be treated as 'answer_id',0
             */
            $q_id = $exam->responses()->where('answer_id',0)->first()->question_id;
            return redirect("exam/$request->e_id/$q_id/$count");
        }
        else{
            //correction
            $points = 0;
            
            foreach($exam->responses as $res){
                $answer = Question::find($res->question_id)->answers()->find($res->answer_id);
                $points += $answer->true_answer;
            }
            //dd($points);
            return view('frontend.exam.result',compact(
                'points',
                'total'
            ));
        }
    }
}
