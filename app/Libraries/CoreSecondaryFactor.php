<?php namespace App\Libraries;


class CoreSecondaryFactor{

	
	public $kriteria;
	public $cf;
	public $sf;

	public function __construct($kriteria,$cf,$sf){
		$this->kriteria = $kriteria;
		$this->cf = $cf;
		$this->sf = $sf;

	}

	public function make(){
		$coresec=$this->coresec();
		$total = $this->total($coresec); 
		$data['coresec'] = $coresec;
		$data['total'] = $total;

		return $data;
	}

	private function coresec(){
		$core = array();
		foreach ($this->kriteria as $key => $value) {
			foreach ($value as $i => $v) {
				$core[$key][$i]['cf'] = $this->convert($v,'cf',$key);
				$core[$key][$i]['sf'] = $this->convert($v,'sf',$key);
			}
				
		}
		return $core;
	}

	private function total($coresec){
		$persenCf = 0.6;
		$persenSf = 0.4;
		$data = array();

		foreach ($coresec as $key => $value) {
			foreach ($value as $i => $v) {
				$total = ($persenCf*$v['cf'])+($persenSf*$v['sf']);
				$data[$key][$i] = $total;
			}
		}
		return $data;
	}

	private function convert($nilai,$tipe,$f){
		if($tipe=='cf'){
			$factor = $this->cf;
		}else if($tipe == 'sf'){
			$factor = $this->sf;
		}

		$total =0;
		foreach ($nilai as $key => $value) {
			$i = $key+1;
			if(in_array($i,$factor[$f])){
					$total+=$value;
			}
				
		}

		return $total/count($factor[$f]);
		
	}



}