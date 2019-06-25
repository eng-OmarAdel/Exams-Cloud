<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Authority;
use App\Track;
use App\Category;
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
            'name'        => 'required|max:255|unique:authorities',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }
        $user = \Auth::user();
        // $track = Track::where('_id', $request['track'])->first();
        // $category = Category::where('_id', $request['category'])->first();

/////////////////////////////////////////////////////////////////////////////////////
        $e                 = new Authority();
        // $request['track'] = $track['name'];
        // $request['category'] = $category['name'];
        // $request['status'] = "approved";
        $request['created_by'] = $user['email'];


        $e->fill($request->all());
        $e->save();
        $rootTrack= new Track();
        $rootTrack['name'] = "root";
        $rootTrack['auth_id'] = $e['_id'];
        $rootTrack['level'] = -1;
        $rootTrack['child_ids'] = [];
        $rootTrack->save();
        return response()->json($e);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       $auth =  Authority::where('_id', $id)->first();
       return view("common.AuthProfile", ["auth"=>$auth]);
    }

    public function update(Request $request, $id)
    {

            $validator = Validator::make($request->all(), [
                'name'    => 'required|max:255|unique:authorities',

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), 422);

            }

}


    public function destroy($id)
    {
        $user = \Auth::user();
        $Authority = Authority::where('_id', $id)->first();
        if($user['email'] == $Authority['created_by'])
        {
            Authority::where('_id', $id)->delete();
        }
    }

    public function Correct(Request $request,$id) {

}
    public function isDuplicate($target_question , $target_answer )
    {
    }

}
