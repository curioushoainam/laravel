<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use \App\User;
class AuthController extends Controller
{
    
	public function login(Request $req){
		// the function check login
		//$this->viewArr($req->toArray());

		$username = $req['username'];
		$password = $req['password'];
		if(isset($username,$password) && $username && $password){
			if(Auth::attempt(['name'=>$username, 'password'=>$password]))
				return view('loginsuccessfully',['user'=>Auth::user()]);
			else 
				return view('login',['error'=>'login failed !']);
		}

		// ----------------------------------------------------------
		// login by model
		// $user = User::find(1);
		// Auth::user($user);
		// return view('loginsuccessfully',['user'=>Auth::user()]);

	}

	public function logout(){
		Auth::logout();
		return view('login');
	}
}
