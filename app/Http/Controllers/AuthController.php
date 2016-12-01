<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{

    public function getLogin(){
    	return view('auth.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=> 'required',
            'password' => 'required'
        ]);
        if (!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
            return redirect()->back()->with('error', 'Invalid username or password. Try again!');
        }
        return redirect()->route('pages.welcome')->with('success', 'You are now signed in!');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('pages.welcome')->with('success','You have successfully logged out');

    }
    public function getRegister(){
    	return view('auth.register');
    }

    public function postRegister(Request $request){
    	$this->validate($request,[
    		'name'=> 'required|unique:users|max:30',
            'email'=> 'required|email|unique:users|max:30',
            'password'=> 'required|confirmed|min:6'
        ]);

        $user= User::create([
        	'name'=> $request->input('name'),
            'email'=>$request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        Auth::login($user);
        return redirect()->route('pages.welcome')->with('success', 'Your account have been successfully created!');
    }
}
