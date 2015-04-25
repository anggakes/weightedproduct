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


Route::get(
	'karyawan/datatables',
	['as'=>'karyawan.datatables',
	'uses'=>'KaryawanController@datatables']);

Route::resource('karyawan','KaryawanController');

Route::get(
	'kriteria/datatables',
	['as'=>'kriteria.datatables',
	'uses'=>'KriteriaController@datatables']);

Route::resource('kriteria','KriteriaController');



// User

Route::get(
	'user/datatables',
	['as'=>'user.datatables',
	'uses'=>'UserController@datatables']
);

Route::resource('user','UserController');

Route::controller('penilaian', 'PenilaianController');
Route::controller('laporan', 'LaporanController');

Route::controller('login','Auth\Authcontroller');
Route::get('/',['as'=>'home','uses'=>'Homecontroller@index']);
