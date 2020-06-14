<?php

namespace App\Http\Controllers\apartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use Session;
use Validator;
use DB;
use Redirect;
use Nexmo\Laravel\Facade\Nexmo;

class ApartmentController extends Controller
{
	function index()
	{
		$apartments = Apartment::all();
		return view('apartment.apartments', compact('apartments'));
	}

	public function ApartmentForm()
	{
		$user_id = Session::get('user_id');
		$user = User::where('user_id', $user_id)->first();
		return view('apartment.apartment_form', compact('user'));
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
		
		$errors = Validator::make($req->all(), $rules);
		if($errors->fails()){
			return Redirect::back()->withErrors($errors);
		}

		$id = $req->apartment_id;

		if($id == NULL || $id == ''){
			$unit_name = Apartment::where('unit_name', $req->unit_name)->get();
		}else{
			$unit_name = Apartment::where('unit_name', $req->unit_name)->where('id', '!=', $id)->get();
		}
		if(count($unit_name)>0){
			return Redirect::back()->withErrors(['Unit name already exist']);
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

		if($id == NULL || $id == ''){
			if($apartment->save()){	
				return redirect('/apartments')
				        ->with('success', 'Apartment info saved.');
			}
		}else{
			$update = $this->updateApartmentInfo($req);
			if($update){
				return redirect('/apartments')
				        ->with('success', 'Apartment info updated successfully.');
			}else{
				return redirect('/apartment-form')
				        ->with('error', 'Apartment info not updated.');
			}
		}
	}

	public function updateApartmentInfo($param)
	{
		$update = DB::table('apartments')
            ->where('id', $param->apartment_id)
            ->update([
            	'floor' => $param->floor,
            	'unit' => $param->unit,
            	'unit_name' => $param->unit_name,
            	'bed_room' => $param->bed_room,
            	'wash_room' => $param->wash_room,
            	'drawing_dining' => $param->drawing_dining,
            	'kitchen_room' => $param->kitchen_room,
            	'belcony' => $param->belcony,
            	'unit_size' => $param->unit_size,
            	'unit_advance' => $param->unit_advance,
            	'monthly_rent' => $param->monthly_rent,
            	'meter_no' => $param->meter_no,
            	'updated_by' => Session::get('user_id'),
            	'updated_at' => date('Y-m-d H:i:s')
            ]);
        return $update;
	}

	public function editApartmentInfo($id)
	{
		$apartment = Apartment::where('id', $id)->first();
		$user_id = Session::get('user_id');
		$user = User::where('user_id', $user_id)->first();
		return view('apartment.apartment_form', compact('user', 'apartment'));

	}

	function toRentApartment($apartmentId){
		$apartment_id = DB::table('apartments')->select('id')->where('id', $apartmentId)->first();
		$apartment_id = $apartment_id->id;

		return view('apartment.apartment_to_rent', compact('apartment_id'));
	}

}
