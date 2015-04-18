<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiProfilMatching extends Model {

	protected $table ='nilai_profil_matching';
	protected $guarded =['id'];
	protected $fillable = [
		'id_karyawan',
		'id_lowongan'
	];

	public function karyawan(){
		return $this->belongsTo("App\Karyawan","id_karyawan");
	}

}
