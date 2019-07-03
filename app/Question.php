<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Question extends Eloquent
{


	public function answers()
    {
        return $this->embedsMany('App\Answer');
    }

    public function tags()
    {
        return $this->embedsMany('App\Tag');
    }
    protected $fillable = [

        'name',
        'category',
        'track' , 
        'type',
        'programming_language',
        'exam_id',
        'question_id',
        'user_id',
        'answer_id', // programing output -> 120 (factroial of 5)
        'is_programming','status', 'created_at','updated_at',
    ];
    static function noneProgValidation($request){

    	        $validator = Validator::make($request->all(), [
                    'answer.*' =>'required'
                ]);

                if ($validator->fails()) {
                    return $validator->errors()->all();
                }
            if($request->type=="choose"){
                if(count($request->answer)<2){
                    return ["the question must have more than 1 Choice"];
                }
                if(!isset($request->is_true)){
                    return ["the question must have a true answer"];
                }


            }else if($request->type=="complete"){

                if(substr_count($request->name,"______")!=count($request->answer)){
                    return ["Please make no of missing spaces equal to no of answers"];
                }
            }
           return 1;
    }
}
