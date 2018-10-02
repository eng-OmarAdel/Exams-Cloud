<?php
namespace App\Http\Controllers;

use App\Question;
use App\Exam;
use App\Answer;
use App\Response;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input ;
use File;
use Auth;

/**
 * toDo:
 * identify status values [0/1]
 */

class ExamController extends Controller
{
    public function welcome() {
        return view('frontend.exam.welcome');
    }


    public function generate(Request $request) {
        // question props: title','category_id','sub_category_id','difficulty','status'

        $category_id = $request['category_id'];
        $sub_category_id = $request['sub_category_id'];
        $difficulty = $request['difficulty'];

        $exam = new Exam();
        $exam->category_id = $category_id;
        $exam->sub_category_id = $sub_category_id;
        $exam->sub_category_id = $sub_category_id;
        $exam->difficulty =$difficulty;

        $ques = Question::inRandomOrder()
            ->where('category_id',$category_id)
            ->where('sub_category_id',$sub_category_id)
            ->where('difficulty',$difficulty)
            ->where('status',1)
            ->take(10)
            ->pluck('id')->all();//array of ques' ids
        if(len($ques)){
            foreach ($ques as $q){
                $response = new Response();
                $response->question_id = $q;
                $response->answer_id = 0;
                $exam->responses()->associate($response);
            }
            $exam->save();
            return redirect()->url('exam/'+$exam->id+'/'+$ques[0]);    
        }
        return redirect()->back()->with(['msg'=>'no questions matches your filters']);
    }
}
