<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilSyaratKaryawan extends Model {

	protected $table ='profil_syarat_karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_karyawan',
		'id_divisi',
		'pendidikan_terakhir',
		'tgl_masuk_kerja',
		'nilai_pendidikan_terakhir'
	];

	public function karyawan(){
		return $this->belongsTo("App\Karyawan","id_karyawan");
	}

	public function divisi(){
		return $this->belongsTo('App\Divisi','id_divisi');
	}

	

}
