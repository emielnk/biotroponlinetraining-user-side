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
// debugging
Route::post('/loginUser', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');
//Route::get('/getuser', 'LoginController@updateProfile');
//Route::get('listtraining', 'TrainingController@listtraining');
Route::group(['middleware' => 'loginKernel'], function() {
	Route::get('main', function() {
		return redirect()->action('RegisTrainingController@showavalible');
	});
	Route::get('trainingpage/{id_training}', 'TrainingController@getPertemuan');
	Route::get('registraining', function() {
		return View::make('registraining');
	});
	Route::get('/absen/{id_user}/{id_pertemuan}', 'AbsenController@absenPertemuan');
	Route::get('trainingpage/bahan/{id_pertemuan}', 'TrainingController@getBahan');
	// Route::get('registertraining', 'RegisTrainingController@showavalibel');
	Route::get('main', 'RegisTrainingController@showavalible');
	Route::get('registertraining/formjoin/{id_user}/{id_training}', 'RegisTrainingController@registertrainingView');
	Route::get('/', 'RegisTrainingController@showavalible');
	Route::get('/evaluasi/{id_training}', 'EvaluasiController@page');
	Route::post('registertraining/join/{id_training}', 'RegisTrainingController@registertraining');
	Route::get('pretest/{id_training}', 'TestController@getPreTest');
	Route::get('postest/{id_training}', 'TestController@getPostTest');
	Route::get('userprofile', 'ProfileController@index');
	Route::post('userprofile/save', 'ProfileController@update');
	Route::post('pretest/pretest/save/{id_test}', 'TestController@saveUserAnswerPre');
	Route::post('postest/postest/save/{id_test}', 'TestController@saveUserAnswerPost');
	// Route::get('postest/{id_training}', 'TestController@getTestPos');
});

Route::get('/registerpage', function() {
	if(session()->has('email') && session()->has('password')){
		return redirect()->action('RegisTrainingController@showavalible');
	}
	else{
		return View::make('registerpage');
	}
});

Route::get('login', function()
{
	if(session()->has('email') && session()->has('password')){
		return redirect()->action('RegisTrainingController@showavalible');
	}
	else{
		return View::make('login');
	}
});


// Route::get('/', function()
// {
// 	if(session()->has('email') && session()->has('password')){
// 		return View::make('main');
// 	}
// 	else{
// 		return View::make('login');
// 	}
// });

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
