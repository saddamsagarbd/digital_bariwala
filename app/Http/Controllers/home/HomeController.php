<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Routing\UrlGenerator;

class homeController extends Controller
{
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }
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
	    		return response()->json(['status' => "error", 'message' => "invalid login credential"]);
	    	}else{
                
	    		Session::flash('message', 'Login Successful.');
                Session::put('user_id', $user->user_id);
                Session::put('first_name', $user->first_name);
                Session::put('last_name', $user->last_name);
                Session::put('user_type', $user->user_type);
                $redirect_url = '/dashboard';
		    	return response()->json(['status' => "success", 'message' => "login successful", 'url'=> $this->url->to('/dashboard')]);
	    	}
    	}
    }
    public function dashboard(){
    	return view('sa_dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
