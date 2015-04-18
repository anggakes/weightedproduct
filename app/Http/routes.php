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

Route::get('karyawan/nilai/{id_lowongan}/{id_karyawan}',
	['as'=>'karyawan.get.nilai',
	'uses'=>'KaryawanController@getNilai']);

Route::post('karyawan/nilai/{id_lowongan}/{id_karyawan}',
	['as'=>'karyawan.post.nilai',
	'uses'=>'KaryawanController@postNilai']);

Route::resource('karyawan','KaryawanController');


Route::get(
	'lowongan/datatables',
	['as'=>'lowongan.datatables',
	'uses'=>'LowonganController@datatables']);

Route::resource('lowongan','LowonganController');

Route::get(
	'jabatan/datatables',
	['as'=>'jabatan.datatables',
	'uses'=>'JabatanController@datatables']);

Route::resource('jabatan','JabatanController');

Route::controller('lowongan/{id_lowongan}/seleksi','SeleksiJabatanController');

// User

Route::get(
	'user/datatables',
	['as'=>'user.datatables',
	'uses'=>'UserController@datatables']
);

Route::resource('user','UserController');


Route::controller('login','Auth\Authcontroller');
Route::controller('lowongan/{id_lowongan}/stepbystep','StepByStepController');
Route::get('/',['as'=>'home','uses'=>'Homecontroller@index']);
