<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class registerController extends Controller
{
	public function create()
    {
        return view('auth.register');
    }
    


      public function store(Request $request)
    
   
             {
        $this->validate(request(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        $user= new User() ;
        $user->password=$request['password'];
        $user->email=$request['email'];
        $user->username=$request['username'];
        $user->full_name=$request['fullname'];
        $user->status='approved';
        $user->type='user';
        // $user = User::create(request(['name', 'email', 'password']));
        $user->save() ;
       
        
        auth()->login($user);
        
        return redirect()->to('/');
    }


}
