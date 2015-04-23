<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model {

	//
	protected $table ='penilaian';

	public function karyawan (){
		return $this->belongsTo('App\Karyawan','id_karyawan');
	}

	public function kriteria(){
		return $this->belongsTo('App\Karyawan','id_kriteria');
	}
}
