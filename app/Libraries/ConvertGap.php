<?php namespace App\Libraries;

use DB;

class ConvertGap{

	public $gap;
	public $bobotNilaiGap;

	public function __construct($gap){
		$this->gap = $gap;
		$this->setBobotNilaiGap();
	}

	public function make(){
		$data=array();
		foreach ($this->gap as $key => $value) {
			foreach($value as $i => $v){
				$data[$key][] = $this->convertGap($v);
			}
		}
		return $data;
	}

	public function setBobotNilaiGap(){

		$n = DB::table('bobot_nilai_gap')->get();
		foreach ($n as $key => $value) {
			$this->bobotNilaiGap[$key]['selisih'] = $value->selisih;
			$this->bobotNilaiGap[$key]['bobot'] = $value->bobot;
		}
	}

	private function convertGap($nilai){
		foreach ($this->bobotNilaiGap as $key => $value) {
			if($value['selisih'] == $nilai){
				$return = $value['bobot'];
			}
		}

		return $return;
	}



}