<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use validator;
use Auth;

class MainController extends Controller
{
    
	function index()
	{
		return view('login');
	}

	function checklogin(Request $request){
		$validateData = $this->validate($request,[
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:5'
		]);

		$user_data = array(
			'email' => $request->get('email'), 
			'password' => $request->get('password')
		);

		if(Auth::attempt($user_data)){
			return redirect('main/successlogin');
		}else{
			return back()->with('error','Wrong login details');
		}
	}

	function successlogin()
	{
		//Get user id from session
		$user_id = Auth::user()->id;

		//get product list with the of user id
		$products = DB::select('select * from product where user_id = "'.$user_id.'"');

		return view('successlogin',['products'=>$products]);
	}

	function logout()
	{
		Auth::logout();
		return redirect('main');
	}


	function add_product(Request $request)
	{
		//Get product details
		$values = array(
			'user_id' => Auth::user()->id, 
			'product_name' => $request->input('product_name'),
			'product_price' => $request->input('product_price'),
			'product_quantity' => $request->input('product_quantity'),
			'status' => $request->input('status')
		);

		// Insert prodcut details in product table
		DB::table('product')->insert($values);

		//back to success message 
		return Redirect::back()->with('msg','Product added successfully.');
	}

	function edit_product($id)
	{
		//get product details with the help of ID
		$product = DB::table('product')
					->select('*')
					->where('id','=',$id)
					->first();

		//load edit page and pass product details on edit page
		return view('edit_product',['product'=>$product]);
	}


	function update_product(Request $request)
	{
		//Get the product Id 
		$id = $request->input('product_id');

		//Get product details from from 
		$values = array(
			'product_name' => $request->input('product_name'),
			'product_price' => $request->input('product_price'),
			'product_quantity' => $request->input('product_quantity'),
			'status' => $request->input('status')
		);

		// Update prodcut details in product table with the help product id
		DB::table('product')->where('id',$id)->update($values);

		//back to success message 
		session()->flash('msg','Product has been updated successfully.');
		return redirect('main/successlogin');
	}

	function status_update($id)
	{
		//get product status with the help of product ID
		$product = DB::table('product')
					->select('status')
					->where('id','=',$id)
					->first();

		//Check user status
		if($product->status == '1'){
			$status = '0';
		}else{
			$status = '1';
		}

		//update product status
		$values = array('status' => $status );
		DB::table('product')->where('id',$id)->update($values);

		session()->flash('msg','Product status has been updated successfully.');
		return redirect('main/successlogin');
	}

}
