<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class homeController extends Controller
{
    public function index(){
    	return view('login.login');
    }
    public function login(Request $request){
    	$validation = $request->validate([
	        'userId' => 'required|min:11',
	        'password' => 'required|min:10',
    	]);
    	
    	if(!empty($validation)){
	    	$user = User::where('mobile_no', $request->userId)->first()->toArray();
	    	if(empty($user)){
	    		echo "User not found";
	    	}
	    	Session::put("user", $user);
	    	return redirect('/dashboard')->with('status', 'Profile updated!');
    	}
    }
    public function dashboard(){
    	return view('sa_dashboard');
    }
}
