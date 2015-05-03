<?php namespace App\Libraries;

use App\NilaiKriteria;

class ConvertBobotWeightedProduct{

	public $nilai;
	
	public function __construct($nilai){
	
		$this->nilai 	= $nilai;
	}

	public function make(){

		$return = array();
		
		foreach($this->nilai as $key => $kriteria):

			foreach ($kriteria as $kode_kriteria => $nilai):
			
			$bobot = NilaiKriteria::whereRaw("kode_kriteria = '$kode_kriteria' AND batas_atas >= $nilai AND batas_bawah <= $nilai ")->first();
			if(count($bobot)>0):
				$return[$key][$kode_kriteria] = $bobot->bobot;
			else:
				$return[$key][$kode_kriteria] = 0;
			endif;
			endforeach;

		endforeach;

		return $return;

	}

	
}