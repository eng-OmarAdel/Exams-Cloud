<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Authority;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Jenssegers\Mongodb\Auth;

class AuthorityController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        $authorities['aaData'] = Authority::orderBy("id")->get();

        return response()->json($authorities);
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
            'name'        => 'required|max:255|unique:users',
            'track'     => 'required|max:255|unique:users',
            'category' => 'required|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }

/////////////////////////////////////////////////////////////////////////////////////
        $e                 = new Authority();
        $request['status'] = "approved";


        $e->fill($request->all());
        $e->save();
        return response()->json($e);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $Question = Question::where('_id', $id)->with("answers")->with("tags")->first();
         $tags="";
         foreach ($Question['tags'] as  $value) {
            $tags.=  $value['tag'].",";
                     }
        $tags = rtrim($tags, ",");
            unset($Question['tags']);
            $Question['tags']=$tags;
        return response()->json($Question);

    }
    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }

}


    public function destroy($id)
    {
        Authority::where('id', $id)->delete();
    }

    public function Correct(Request $request,$id) {

}
    public function isDuplicate($target_question , $target_answer )
    {
    }

}
