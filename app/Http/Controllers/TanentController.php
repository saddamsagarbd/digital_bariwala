<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanent;
use App\Apartment;
use Session;
use Validator;
use DB;

class TanentController extends Controller
{
    public function saveTanent(Request $r){

		$rules = [
			'apartment_id' 			=> 'required',
			'tanent_name' 			=> 'required',
			'personal_no' 			=> 'required',
			'email' 				=> 'required',
			'indentity_type' 		=> 'required',
			'indentification_no' 	=> 'required'
		];
		
		$error = Validator::make($r->all(), $rules);
		if($error->fails()){
			return response()->json(['status'=> "error",'errors' => $error->errors()->all()]);
		}

		$tanent = new Tanent();

		$tanent->name 		= $r->tanent_name;
		$tanent->contact_no = $r->personal_no;
		$tanent->email 		= $r->email;
		$tanent->id_type 	= $r->indentity_type;
		$tanent->id_no 		= $r->indentification_no;

		/* save tanent information */

		// $tanent->save();

		/* create an account with contact no */

		/* insert a data with tanent ac_no with apartment advance for first time entry. this entry will debit*/

		/* update apartment information with occupied_by recent tanent_id */




	}
}
