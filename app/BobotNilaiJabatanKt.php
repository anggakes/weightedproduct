<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotNilaiJabatanKt extends Model {

	protected $table ='bobot_nilai_jabatan_kt';
	protected $guarded =['id'];
	protected $fillable = [
		'id_lowongan',
		'kt1',
		'kt2'
	];

}
