<?php namespace App\Libraries;


class WeightedProduct{

	public $kriteria;

	public $bobot;

	public $nilai;

	public function __construct( $kriteria, $bobot, $nilai){

	// Inisialisasi	

		$this->kriteria	 	= $kriteria;
		$this->bobot 		= $bobot;
		$this->nilai 		= $nilai;
	}

	public function make($karyawans){
		

		$data 		= array();	
		$vectorV  	= $this->vectorV();

		foreach ($vectorV as $key => $value) {
			$data[$key]['hasil'] = $value;
			$data[$key]['karyawan'] = $karyawans[$key];
		}

		return $this->urutkan($data);
	}

	/* return @array 
		
		index = panggkatbobot, total

	*/

	public function urutkan($data){
		
		/* mengurutkan multidimensional array assosiatif berdasarkan value */
		usort($data, function($a, $b) {	

		// lebih besar = desc; kurang dari = asc

  			return ($a["hasil"] >= $b["hasil"]) ? -1 : 1; 		

  		});

		return $data;
	}

	public function vectorS(){
		
		$nilai = $this->nilai;
		$bobot = $this->bobot;

		$pangkatBobot 	= array();
		$sum 			= 0;

		foreach($this->nilai as $key => $kriteria):
			$hasil = 0;
			
			foreach ($kriteria as $kode_kriteria => $nilai):
			
				$pangkat 	= pow($nilai, $this->bobot[$kode_kriteria]);
				
				$pangkatBobot[$key][$kode_kriteria] = $pangkat;
				
				$hasil += $pangkat;

			endforeach;
			
			$pangkatBobot[$key]['hasil'] = $hasil;

			$sum += $hasil;

		endforeach;
		
		$data['pangkat_bobot'] 	= $pangkatBobot;
		$data['total']			= $sum;

		return $data;

	}

	public function vectorV(){

		$vectorS 	= $this->vectorS();
		$total 		= $vectorS['total'];
		$hasil 		= array();

		foreach ($vectorS['pangkat_bobot'] as $key => $value) {
			$hasil[$key] = $value['hasil']/$total;
		}

		return $hasil;
	}


} /* end of class */