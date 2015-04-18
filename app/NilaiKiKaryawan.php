<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKiKaryawan extends Model {

	protected $table ='nilai_ki_karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_karyawan',
		'ki1',
		'ki2',
		'ki3',
		'ki4',
		'ki5'
	];


}
