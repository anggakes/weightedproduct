<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKtKaryawan extends Model {

	protected $table ='nilai_kt_karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_karyawan',
		'kt1',
		'kt2'
	];

}
