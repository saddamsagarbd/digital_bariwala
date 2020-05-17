<?php

namespace App\Http\Controllers\apartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use Session;
use Validator;
use DB;
use Nexmo\Laravel\Facade\Nexmo;

class ApartmentController extends Controller
{
	function index(){
		$user_id = Session::get('user_id');
		$user = User::where('user_id', $user_id)->first();
		$apartments = Apartment::all();
		return view('apartment.apartment_list', compact('user', 'apartments'));
	}
	function saveApartmentInfo(Request $req){
		$rules = [
			'floor' 			=> 'required',
			'unit' 				=> 'required',
			'unit_name' 		=> 'required',
			'bed_room' 			=> 'required',
			'wash_room' 		=> 'required',
			'drawing_dining' 	=> 'required',
			'kitchen_room' 		=> 'required',
			'belcony' 			=> 'required',
			'unit_size' 		=> 'required',
			'unit_advance' 		=> 'required',
			'monthly_rent' 		=> 'required',
			'meter_no' 			=> 'required'
		];
		
		$error = Validator::make($req->all(), $rules);
		if($error->fails()){
			return response()->json(['status'=> "error",'errors' => $error->errors()->all()]);
		}

		$unit_name = Apartment::where('unit_name', $req->unit_name)->get();
		if(count($unit_name)>0){
			return response()->json(['status'=> "error",'error' => "Unit name already exist"]);
		}
		$apartment = new Apartment();
		$apartment->floor 			= $req->floor;
		$apartment->unit 			= $req->unit;
		$apartment->unit_name 		= $req->unit_name;
		$apartment->bed_room 		= $req->bed_room;
		$apartment->wash_room 		= $req->wash_room;
		$apartment->drawing_dining 	= $req->drawing_dining;
		$apartment->kitchen_room 	= $req->kitchen_room;
		$apartment->belcony 		= $req->belcony;
		$apartment->unit_size 		= $req->unit_size;
		$apartment->unit_advance 	= $req->unit_advance;
		$apartment->monthly_rent 	= $req->monthly_rent;
		$apartment->meter_no 		= $req->meter_no;
		$apartment->created_by 		= Session::get('user_id');
		$apartment->created_at 		= date('Y-m-d H:i:s');
		
		if($apartment->save()){			
			return response()
			->json(['status' => "success",'message' => "Apartment info saved."]);
		}
	}

	function toRentApartment($apartmentId){
		$apartment_id = DB::table('apartments')->select('id')->where('id', $apartmentId)->first();
		$apartment_id = $apartment_id->id;

		return view('apartment.apartment_to_rent', compact('apartment_id'));
	}

}
