<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotNilaiJabatanKi extends Model {

	protected $table ='bobot_nilai_jabatan_ki';
	protected $guarded =['id'];
	protected $fillable = [
		'id_lowongan',
		'ki1',
		'ki2',
		'ki3',
		'ki4',
		'ki5'
	];

}
