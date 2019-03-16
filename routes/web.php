<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$nindo = new Nindo\Nindo(
		request()->input("efficiency"),
		request()->input("shurikens"),
		request()->input("success"),
		request()->input("fail")
	);
	return view('welcome')->with('nindo', $nindo);
});
