<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model {

	//
	public $option = [
		'100' 	=> "Sangat Memuaskan",
		'80' 	=> "Memuaskan",
		'60' 	=> "Cukup",
		'40'	=> "Kurang Memuaskan",
		'20'	=> "Sangat Kurang Memuaskan"
	];

	protected $table ='penilaian';

	public function karyawan (){
		return $this->belongsTo('App\Karyawan','id_karyawan');
	}

	public function kriteria(){
		return $this->belongsTo('App\Karyawan','id_kriteria');
	}

	public function cek($month, $year){

		$n = $this->select('nilai')->whereRaw("
					Year(periode)=$year AND 
					Month(periode)=$month 
					")->get();

		return (count($n)>0) ? true : false; 
	}

	public function getOption($idx){
		
		return $this->option[$idx];
	}
}
