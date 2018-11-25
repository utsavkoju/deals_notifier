<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\User;

class UserController extends Controller
{
    public function login() {
    	return view('users.login');
    }

    public function register() { 
    	return view('users.register');
    }

    public function saveRegister(Request $request) {
    	$input = $request->input();		//User form inputs load to input variable
    	$rules = array(					//Creating validation rules as per our requirement
    		'fullname' => 'required',
    		'email'	=> 'required|unique:users|email',
    		'password' => 'required|same:confirmPassword',
    	);
    	$validation = \Validator::make($input, $rules);	//passing inputs and rules to check validation; reutrn passes true if validation passed else false;
    	if($validation->passes()){
    		//Creating user object
    		$user = new User();
    		$user->fullname = $request->input('fullname');
    		$user->email = $request->input('email');
    		$user->password = Hash::make($request->input('password'));
    		$user->address = $request->input('address');
    		$user->ip_address = $request->ip();
    		$user->save();

    		return \Redirect::route('login')->with('status','User Created Successfully');
    	}
    	return \Redirect::route('register')->withInput()->withErrors($validation)->with('status','Some validation errors occured');
    }

    public function userLogin(Request $request) {
    	$email = $request->input('email');
    	$password = $request->input('password');
    	if(Auth::attempt(
    		array(
    			'email' => $email,
    			'password' => $password
    		)
    	)) {
    		return \Redirect::route('home')->with('status','Welcome Back');
    	}
    	return \Redirect::route('login')->with('status','Username and password comination doesn\'t match')->withInput();
    }

    public function logout() {
    	Auth::logout();
    	Session::forget('user');
    	return \Redirect::route('login')->with('status','Logout Successfully');
    }
}