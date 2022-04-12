<?php



Route::get('/', function () {
    return view('login');
});

Route::post('/main/checklogin','MainController@checklogin');

Route::get('/main/successlogin','MainController@successlogin');

Route::get('/main/logout','MainController@logout');
Route::get('/main','MainController@index');

Route::get('/register','RegisterController@index');
Route::post('/store','RegisterController@store');

Route::post('/add-product','MainController@add_product');

Route::get('/edit-product/{id}','MainController@edit_product');

Route::post('/update-product','MainController@update_product');

Route::get('/status-update/{id}','MainController@status_update');
