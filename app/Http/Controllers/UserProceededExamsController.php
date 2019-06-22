<?php

namespace App\Http\Controllers;

use Auth;
use App\Exam;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class UserProceededExamsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function UserProceededExams(Request $request)
    {
       $user = User::find(Auth::user()->_id);
       return dd($user->UserExams()) ;
        $Exam = Exam::with(['trackName' => function($q) {
            $q->select('name');
        },'authorityName' => function($q) {
            $q->select('name');
        }
            ])->find($request->_id)    ;

        return response()->json($Exam);


    }

}
