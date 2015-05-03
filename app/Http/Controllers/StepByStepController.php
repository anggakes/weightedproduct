<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use App\Penilaian;
use App\Kriteria;
use App\Karyawan;
use App\Libraries\WeightedProduct;
use App\Libraries\ConvertBobotWeightedProduct;

class StepByStepController extends Controller {

	public function __construct(){

	}

	public function getConvert(Request $request){

		$month = ($request->has('m')) ? $request->input('m') : date('m');
		$year = ($request->has('y')) ? $request->input('y') : date('Y');

		// $penilaian = Penilaian::whereRaw("Year(periode) = $year AND Month(periode) = $month")->get();
		$kriterias 	= Kriteria::all();
		$karyawans 	= Karyawan::all();
		$bobot 		= array();
		$nilai		= array();
		$penilaian 	= new Penilaian;

if($penilaian->cek( $month, $year)){

		foreach ($kriterias as $key => $value) :

			$bobot[$value->kode] = $value->bobot;
		
		endforeach;

		foreach ($karyawans as $key => $karyawan) :
			
			foreach ($kriterias as $i => $kriteria) :

				$n = Penilaian::select('nilai')->whereRaw("
					Year(periode)=$year AND 
					Month(periode)=$month AND 
					id_karyawan=$karyawan->id AND 
					kode_kriteria='$kriteria->kode'")->first();

				if(count($n)>0):
					$nilai[$key][$kriteria->kode] = $n->nilai;
				else:
					$nilai[$key][$kriteria->kode] = 0;
				endif;
				
			endforeach;
			
		endforeach;

	$n = new ConvertBobotWeightedProduct($nilai);

		$nilai = $n->make();
}


		return view("stepbystep.konvert")
			->with('nilai',$nilai)
			->with('periode',['m'=>$month,'y'=>$year])
			->with("kriterias",$kriterias)
			->with('karyawans',$karyawans);

	}


	public function getVectors(Request $request){

		$month = ($request->has('m')) ? $request->input('m') : date('m');
		$year = ($request->has('y')) ? $request->input('y') : date('Y');

		// $penilaian = Penilaian::whereRaw("Year(periode) = $year AND Month(periode) = $month")->get();
		$kriterias 	= Kriteria::all();
		$karyawans 	= Karyawan::all();
		$bobot 		= array();
		$nilai		= array();
		$penilaian 	= new Penilaian;
		$wp 		= array();

if($penilaian->cek( $month, $year)){

		foreach ($kriterias as $key => $value) :

			$bobot[$value->kode] = $value->bobot;
		
		endforeach;

		foreach ($karyawans as $key => $karyawan) :
			
			foreach ($kriterias as $i => $kriteria) :

				$n = Penilaian::select('nilai')->whereRaw("
					Year(periode)=$year AND 
					Month(periode)=$month AND 
					id_karyawan=$karyawan->id AND 
					kode_kriteria='$kriteria->kode'")->first();

				if(count($n)>0):
					$nilai[$key][$kriteria->kode] = $n->nilai;
				else:
					$nilai[$key][$kriteria->kode] = 0;
				endif;
				
			endforeach;
			
		endforeach;

	$n = new ConvertBobotWeightedProduct($nilai);

		$nilai = $n->make();
		
	$wp = new WeightedProduct($kriterias, $bobot, $nilai);

		$wp = $wp->vectorS();
}

		$batas = 15; // jumlah karyawan yang berhak menerima bonus


		return view("stepbystep.index")
			->with('wp', $wp)
			->with('batas',$batas)
			->with('periode',['m'=>$month,'y'=>$year])
			->with("kriterias",$kriterias)
			->with('karyawans',$karyawans);

	}

} /* end of class */
