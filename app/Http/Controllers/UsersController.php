<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobseeker;
use App\User;
use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function emailcheck(Request $request)
    {
   
            $user = User::where("email", $request->email)->count();

        if ($user > 0) {

            return response()->json('this email is already taken');
        } else {

            return response()->json('true');

        }
    }
    public function index()
    {
        $users['aaData'] = User::where('type', "admin")->orderBy("updated_at", "desc")->get();

        return response()->json($users);
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
            'username'        => 'required|max:255|unique:users',
            'full_name'       => 'required|max:255',
            'password'        => 'required|max:255',
            'confirmpassword' => 'required|max:255',
            'email'           => 'required|max:255|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }

/////////////////////////////////////////////////////////////////////////////////////
        $e                 = new User();
        $request['status'] = "approved";
        $request['type']   = "admin";

        $request['password'] = bcrypt($request['password']);

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
        $e = User::where('type', "admin")->where('_id', $id)->get()->first();
        return response()->json($e);
    }
    public function update(Request $request, $id)
    {
        // return $id;

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',

            'username'  => 'required|max:255|unique:users,username,' . $id.',_id',
            'password'  => 'max:255',
            'email'     => 'required|max:255|email|unique:users,email,' . $id.',_id',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 422);

        }
        $e = User::where('type', "admin")->where('_id', $id)->get()->first();

        if (empty($request['password'])) {

            $e->fill($request->all());
            $e->offsetUnset('password');

        } else {

            $request['password'] = bcrypt($request['password']);
            $e->fill($request->all());

        }

        $e->save();
        return response()->json($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = User::where('type', "admin")->where('_id', $id)->get()->first();
        if ($e->status == "approved") {
            $suspend['status'] = "suspended";
        } else {
            $suspend['status'] = "approved";
        }

        $e->fill($suspend);
        $e->save();
        return response()->json($e);

    }
    public function manageuserdelete($id)
    {
        User::where('type', "admin")->where('_id', $id)->delete();
    }

}
