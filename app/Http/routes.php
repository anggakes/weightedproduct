<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(["middleware"=>"auth"],function(){

Route::get(
	'karyawan/datatables',
	['as'=>'karyawan.datatables',
	'uses'=>'KaryawanController@datatables']);
Route::get(
	'karyawan/{id}/datatables',
	['as'=>'penilaiankaryawan.datatables',
	'uses'=>'KaryawanController@penilaianDatatables']);


Route::resource('karyawan','KaryawanController');

Route::get(
	'kriteria/datatables',
	['as'=>'kriteria.datatables',
	'uses'=>'KriteriaController@datatables']);

Route::resource('kriteria','KriteriaController');

Route::get('vectors','StepByStepController@getVectors');
Route::get('konvert','StepByStepController@getConvert');


// User

Route::get(
	'user/datatables',
	['as'=>'user.datatables',
	'uses'=>'UserController@datatables']
);

Route::resource('user','UserController');

Route::controller('penilaian', 'PenilaianController');
Route::controller('laporan', 'LaporanController');


});

Route::controller('login','Auth\Authcontroller');
Route::get('/',['as'=>'home','uses'=>'Homecontroller@index']);
