<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class DashboardController extends Controller
{
    public function index(){
    	return view('sa_dashboard');
    }

    /*
	Session view page
    */
    public function session(){
    	return view('session');
    }
    /*
	user lit
    */
    public function userlist(){
    	return view('userlist');
    }

    /*
		user data from UI to store
    */
	public function create(Request $request){
		$rules = [
			'first_name' 	=> 'required',
			'last_name' 	=> 'required',
			'gender' 		=> 'required',
			'mobile_no' 	=> 'required|max:11',
			'address' 		=> 'required',
			'floors' 		=> 'required',
			'units' 		=> 'required',
		];
		
		$error = Validator::make($request->all(), $rules);
		if($error->fails()){
			return response()->json(['errors' => $error->errors()->all()]);
		}
		$user = User::where('status', 1)->where('user_type', 2)->get();
		$n = count($user) + 1;

		$u_data = new User();
		$u_data->user_id = date('Y').$n;
		$u_data->first_name = $request->first_name;
		$u_data->last_name = $request->last_name;
		$u_data->gender = $request->gender;
		$u_data->mobile_no = $request->mobile_no;
		$u_data->address = $request->address;
		$u_data->floors = $request->floors;
		$u_data->units = $request->units;
		$u_data->password = md5($request->mobile_no);
		$u_data->user_type = 2;
		$u_data->created_at = date('Y-m-d H:i:s');
		if($u_data->save()){
			return response()
					->json(['success' => 'User added successfully']);
		}
		return response()
					->json(['errors' => 'User not created. Something wrong happen.']);
	}
}
