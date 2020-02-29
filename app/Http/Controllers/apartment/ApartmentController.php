<?php

namespace App\Http\Controllers\apartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class ApartmentController extends Controller
{
    function index(){
    	$user_id = Session::get('user_id');
    	$user = User::where('user_id', $user_id)->first();
    	return view('apartment.apartment_list')->with('user', $user);
    }
}
