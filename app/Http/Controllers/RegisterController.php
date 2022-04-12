<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Redirect;

class RegisterController extends Controller
{
    function index()
    {
    	return view('register');
    }

    //Create store function
    function store(Request $request)
    {
        //get all user details
    	$values = array(
    		'name' => $request->input('fullname'),
    		'email' => $request->input('email'), 
    		'password' => bcrypt($request->input('password')),
    		'remember_token' => $request->input('token')
    	);

        //insert user details in users table
    	DB::table('users')->insert($values);

        //back with success message
    	return Redirect::back()->with('msg','You have successfully registered.');
    }
    
}
