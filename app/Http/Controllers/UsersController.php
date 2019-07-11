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
        // $users = User::where('type', "admin")->orderBy("updated_at", "desc")->get();
        $users = User::orderBy("updated_at", "desc")->get();
        return datatables()->of($users)->toJson();

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

        $request['password'] = $request['password'];

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
    public function showProfile()
    {
        $user = \Auth::user();
        //$e = User::where('_id', $id)->get()->first();
        return view("common/profile" ,compact("user"));
    }
    public function proUpdate()
    {
        $user = \Auth::user();
        return view("common/profileEdit" ,compact("user"));
    }
    public function activity()
    {
        $user = \Auth::user();
        return view("common/Statistics" ,compact("user"));
    }
    public function update(Request $request)
    {
        // return $id;
       
        $id = \Auth::user()->id ;
        $user=User::find($id);
        $user->full_name=request('full_name');
        $user->linkedin=request('linkedin');
        $user->facebook=request('facebook');
        $user->twitter=request('twitter');

         // Handle File Upload
        if($request->hasFile('profile_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_img')->storeAs('public/profile_img', $fileNameToStore);
            $user->profile_img = $fileNameToStore;
        } 


        $user->save();
        return redirect('/profile');
      /*  $validator = Validator::make($request->all(), [
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

            $request['password'] = $request['password'];
            $e->fill($request->all());

        }

        $e->save();
        return response()->json($e);*/
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
