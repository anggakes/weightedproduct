<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilSyaratJabatan extends Model {

	protected $table ='profil_syarat_jabatan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_lowongan',
		'pendidikan_terakhir',
		'pengalaman_kerja'
	];

}
