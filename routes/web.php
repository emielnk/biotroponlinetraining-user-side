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
Route::post('/loginUser', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');
//Route::get('/getuser', 'LoginController@updateProfile');
//Route::get('listtraining', 'TrainingController@listtraining');
Route::get('/debug', 'HomeController@getUserInfo');

Route::group(['middleware' => 'loginKernel'], function() {
	Route::get('mcharts', function() {
		return View::make('mcharts');
	});
	Route::get('registraining', function() {
		return View::make('registraining');
	});
});

Route::get('/registerpage', function() {
	if(session()->has('email') && session()->has('password')){
		return View::make('mcharts');
	}
	else{
		return View::make('registerpage');
	}
});

Route::get('login', function()
{
	if(session()->has('email') && session()->has('password')){
		return View::make('mcharts');
	}
	else{
		return View::make('login');
	}
});


Route::get('/', function()
{
	if(session()->has('email') && session()->has('password')){
		return View::make('mcharts');
	}
	else{
		return View::make('login');
	}
});

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});

Route::get('user/activation/{token}', 'RegisterController@userActivation');

Route::get('/home', 'HomeController@index');
