<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use redirect;

class homeController extends Controller
{
    public function index(){
    	return view('login.login');
    }
    public function loginCheck(Request $request){
    	$validation = $request->validate([
	        'userId' => 'required|min:11',
	        'password' => 'required|min:10',
    	]);
    	
    	if(!empty($validation)){
    		$userId = $request->userId;
    		$password = md5($request->password);
	    	$user = DB::table('users')
	    				->where('mobile_no', $userId)
	    				->where('password', $password)
	    				->first();
	    	if(empty($user)){
	    		Session::flash('message', 'Incorrect Login information!');
	    		return redirect('/');
	    	}else{
	    		Session::flash('message', 'Login Successful.');
	    		Session::put('username', $user->name);
		    	return redirect('/dashboard');
	    	}
    	}
    }
    public function dashboard(){
    	return view('sa_dashboard');
    }
}
