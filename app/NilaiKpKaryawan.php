<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKpKaryawan extends Model {

	protected $table ='nilai_kp_karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_karyawan',
		'kp1',
		'kp2',
		'kp3'
	];
}
