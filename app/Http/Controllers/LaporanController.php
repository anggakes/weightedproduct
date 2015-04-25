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

class LaporanController extends Controller {

	public function __construct(){

	}

	public function getIndex(Request $request){

		$month = ($request->has('m')) ? $request->input('m') : date('m');
		$year = ($request->has('y')) ? $request->input('y') : date('Y');

		// $penilaian = Penilaian::whereRaw("Year(periode) = $year AND Month(periode) = $month")->get();
		$kriterias 	= Kriteria::all();
		$karyawans 	= Karyawan::all();
		$bobot 		= array();
		$nilai		= array();
		$penilaian 	= new Penilaian;

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

				$nilai[$key][$kriteria->kode] = $n->nilai;

			endforeach;
			
		endforeach;

	$n = new ConvertBobotWeightedProduct($nilai);

		$nilai = $n->make();
		
	$wp = new WeightedProduct($kriterias, $bobot, $nilai);

		$wp = $wp->make($karyawans);

		return ($wp);

	}

} /* end of class */
