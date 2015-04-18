<?php namespace App\Libraries;


class HitungGap{

	public $bobot;
	public $nilai;
	public $kriteria;

	public function __construct($bobot,$nilai,$kriteria){
		$this->bobot = $bobot;
		$this->nilai = $nilai;
		$this->kriteria = $kriteria;
	}

	public function make(){
		$data = array();
		foreach($this->nilai as $key=>$value){
			foreach ($this->bobot[$this->kriteria] as $idx => $val) {
				 	$data[$key][] = $value[$this->kriteria][$idx] - $val; 
			 } 
		}

		return $data;
	}


}