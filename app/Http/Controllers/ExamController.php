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
                        '$sample' => ['size' => 2]
                    ]
                ]);
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
            return redirect()->url('exam/'+$exam->id+'/'+$ques[0]);    
        }

        return redirect()->back()->with(['msg'=>'no questions match your filters']);
    }
}
