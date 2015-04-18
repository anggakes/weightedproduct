<?php namespace App\Libraries;

use App\Libraries\HitungGap;

class ProfileMatching{


	public $nilai;
	public $bobot;
	public $id_lowongan;

	public function __construct($id_lowongan, $bobot, $nilai){
		$this->id_lowongan = $id_lowongan;
		$this->bobot = $bobot;
		$this->nilai = $nilai;
	}

	public function gapKi(){
		$ki = new HitungGap($this->bobot,$this->nilai,'ki');
		return $ki->make();
	}
	public function gapKp(){
		$ki = new HitungGap($this->bobot,$this->nilai,'kp');
		return $ki->make();
	}
	public function gapKt(){
		$ki = new HitungGap($this->bobot,$this->nilai,'kt');
		return $ki->make();
	}

	public function convertGap($gap){
		$cg = new ConvertGap($gap);
		return $cg->make();
	}

	public function coreSecondaryFactor(){
		$kriteria['ki'] = $this->convertGap($this->gapKi());
		$kriteria['kp'] = $this->convertGap($this->gapKp());
		$kriteria['kt'] = $this->convertGap($this->gapKt());
		
		$cf['ki'] = [2,3,5];
		$sf['ki'] = [1,4];

		$cf['kp'] = [2,3];
		$sf['kp'] = [1];
		
		$cf['kt'] = [1];
		$sf['kt'] = [2];
		

		$scf = new CoreSecondaryFactor($kriteria,$cf,$sf);
		return $scf->make();
	}

	public function make(){ // menghitung nilai akhir
		$persenKi = 0.3;
		$persenKp = 0.4;
		$persenKt = 0.3;

		$csf = $this->coreSecondaryFactor();
		$data = array();

		foreach($csf['total']['ki'] as $key => $value){
			$data[] = ($csf['total']['ki'][$key]*$persenKi) + ($csf['total']['kp'][$key]*$persenKp) + ($csf['total']['kt'][$key]*$persenKt);
		}

		return $data;
	}
}