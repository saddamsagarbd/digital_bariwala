<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class DashboardController extends Controller
{
    public function index(){
    	// return view('sa_dashboard');
    	return view('layout.app');
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
    	$users = User::where('user_type', 2)->where('status', 1)->get();
    	return view('userlist', compact('users'));
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

		$u_data = new User();
		if($request->action == "save"){
			$user = User::where('status', 1)->where('user_type', 2)->get();
			$n = count($user) + 1;

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
				$basic  = new \Nexmo\Client\Credentials\Basic('00653125', 'UC2e6a6a9tsnH3Wm');
				$client = new \Nexmo\Client($basic);

				$message = $client->message()->send([
					'to' => $request->mobile_no,
					'from' => 'Digital Bariwala',
					'text' => 'User has been created. Please Login with given phone number as your username and password.'
				]);
				return response()
						->json(['success' => 'User added successfully']);
			}
			
		}
		if($request->action == "update"){
			$user = User::find($request->id);
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->gender = $request->gender;
			$user->mobile_no = $request->mobile_no;
			$user->address = $request->address;
			$user->floors = $request->floors;
			$user->units = $request->units;
			if($user->save()){
				return response()
						->json(['success' => 'Data successfully updated.']);
			}
		}		
		
		return response()
					->json(['errors' => 'User not created. Something wrong happen.']);
	}

	/*
		get individual user data
		@param ID
		return array or object
	*/
		public function getuserbyid($id){
			$user = User::find($id);
			return response()->json(['data'=>$user]);
		}
}
