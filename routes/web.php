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


Route::get('logout', 'LoginController@logout');
Route::post('loginUser', 'LoginController@login');
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
	Route::get('registertraining/formjoin/{id_training}', 'RegisTrainingController@registertrainingView');
	Route::get('/', 'RegisTrainingController@showavalible');
	Route::get('/evaluasi/{id_training}', 'EvaluasiController@page');
	Route::post('registertraining/join/{id_training}', 'RegisTrainingController@registertraining');
	Route::get('pretest/{id_training}', 'TestController@getPreTest');
	Route::get('postest/{id_training}', 'TestController@getPostTest');
	Route::get('userprofile', 'ProfileController@index');
	Route::post('update_photo', 'ProfileController@update_photo');
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

///////GABUNGAN SAMA AYUB////////



Route::group(['Middleware' => 'Auth'], function () {
	Route::get('dashboard','HomeController@index');

	// Pemohon
	Route::get('daftartrainingpemohon','UserController@daftartraining');
	// daftar pemohon
	Route::get('daftartrainingpemohon/{id_training}', [
		'uses' => 'UserController@showpemohon',
		'as' => 'listpemohon'
	]);
	// diterima
	Route::get('daftartrainingpemohon/{id_user}/diterima', [
		'uses' => 'UserController@terimatraining',
		'as' => 'terimatraining'
	]);
	// ditolak
	Route::get('daftartrainingpemohon/{id_user}/ditolak', [
		'uses' => 'UserController@tolaktraining',
		'as' => 'tolaktraining'
	]);
	// pengumuman
	Route::get('pengumuman','HomeController@pengumuman');
	// new pengumuman
	Route::get('newpengumuman','HomeController@newpengumuman');
	Route::post('newpengumuman/save', [
		'uses'=>'HomeController@savepengumuman',
		'as' => 'savepengumuman'
	]);
	// edit pengumuman
	Route::get('pengumuman/edit', 'HomeController@editpengumuman');
	Route::post('pengumuman/updatepengumuman', [
		'uses'=>'HomeController@updatepengumuman',
		'as' => 'updatepengumuman'
	]);



	Route::get('listtraining','AdminTrainingController@listtraining');

	// new training
	Route::get('newtraining','AdminTrainingController@newtraining');
	Route::post('newtraining/save', [
		'uses'=>'AdminTrainingController@savetraining',
		'as' => 'savetraining'
	]);
	// showtraining
	Route::get('listtraining/show/{id_training}', 'AdminTrainingController@showtraining');

	//show peserta
	Route::get('listtraining/show/{id_training}/peserta', [
		'uses' => 'UserController@showpeserta',
		'as' => 'pesertatraining'
	]);

	// edit training
	Route::get('listtraining/{id_training}/edit', 'AdminTrainingController@edittraining');
	Route::post('listtraining/{id_training}/updatetraining', [
		'uses'=>'AdminTrainingController@updatetraining',
		'as' => 'updatetraining'
	]);
	// hapus training
	Route::get('listtraining/destroy/{id_training}', 'AdminTrainingController@destroy');


	// detail training => isi pertemuan
	Route::get('listtraining/show/{id_training}/detailtraining', [
		'uses' => 'PertemuanController@showpertemuan',
		'as' => 'detailtraining'
	]);
	// new pertemuan
	Route::get('listtraining/show/{id_training}/detailtraining/newpertemuan','PertemuanController@newpertemuan');
	Route::post('newpertemuan/save', [
		'uses'=>'PertemuanController@savepertemuan',
		'as' => 'savepertemuan'
	]);
	// edit pertemuan
	Route::get('listtraining/show/{id_training}/detailtraining/edit/{id_pertemuan}', [
		'uses'=>'PertemuanController@editpertemuan',
		'as' => 'editpertemuan'
	]);
	Route::post('listtraining/{id_training}/updatepertemuan/{id_pertemuan}', [
		'uses'=>'PertemuanController@updatepertemuan',
		'as' => 'updatepertemuan'
	]);
	// hapus pertemuan
	Route::get('listtraining/{id_training}/destroy/{id_pertemuan}', [
		'uses'=>'PertemuanController@destroytemu',
		'as' => 'destroytemu'
	]);


	// newtest
	Route::get('listtraining/show/{id_training}/detailtraining/newtest', 'AdminTestController@shownewtest');
	// save test
	Route::post('listtraining/show/{id_training}/detailtraining/newtest/save', 'AdminTestController@savequestiontest');
	Route::get('listtraining/show/{id_training}/detailtraining/showtest', 'AdminTestController@showdone');
	// show test
	Route::get('listtraining/show/{id_training}/detailtraining/{id_test}/showtest', [
		'uses'=>'AdminTestController@showtest',
		'as'	=>'showtest'
	]);

	// newtest question
	Route::get('listtraining/show/{id_training}/detailtraining/{id_test}/showtest/newquestion', 'AdminTestController@addnewquestion');
	// save question
	Route::post('listtraining/show/{id_training}/detailtraining/{id_test}/showtest/newtest/save', 'AdminTestController@savequestiontest');
	// edit question
	Route::get('listtraining/show/detailtraining/{id_test}/showtest/edit/{id_question}', [
		'uses'=>'AdminTestController@editquestion',
		'as'	=>'editquestion'
	]);
	// update question
	Route::post('/listtraining/show/detailtraining/{id_test}/showtest/edit/save',[
		'uses'=>'AdminTestController@updatequestion',
		'as'	=>'updatequestion'
	]);
	//hapus question
	Route::get('listtraining/show/detailtraining/{id_test}/showtest/{id_question}/destroy', [
		'uses'=>'AdminTestController@destroyquestion',
		'as' => 'destroyquestion'
	]);

});
