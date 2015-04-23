<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use App\Karyawan;
use App\Kriteria;
use DB;
use App\Penilaian;
use Carbon\Carbon;

class PenilaianController extends Controller {

	//

	public function getIndex(Request $request){

		$month = ($request->has('m')) ? $request->input('m') : date('m');
		$year = ($request->has('y')) ? $request->input('y') : date('Y');
		$penilaian = new Penilaian;	
		$karyawans = Karyawan::all();
		$kriterias = Kriteria::all();


		return view('penilaian.index')
		->with('penilaian', $penilaian)
		->with('tanggal', ['month'=>$month,'year'=>$year])
		->with('kriterias', $kriterias)
		->with('karyawans', $karyawans);
	}

	public function getInput(){
		$karyawans = Karyawan::all();
		$kriterias = Kriteria::all();

		return view('penilaian.create')
			->with('karyawans',$karyawans)
			->with('kriterias',$kriterias);
	}

	public function postInput(Request $request){
		$insert = array();	
			
		foreach ($request->input('id_karyawan') as $k => $v) {
			foreach ($request->input('kriteria') as $kode_kriteria => $kriteria) {
				
				// simpan nilai dalam variabel nilai
					$nilai = $kriteria[$k];

				// simpan data yang akan di insert, $insert
					$insert[] = [
					 'id_karyawan'=>$v,
					 'kode_kriteria'=>$kode_kriteria,
					 'nilai'=>$nilai,
					 'tanggal'=>date("Y-m-d"),
					 'created_at'=>Carbon::now(),
					 'updated_at'=>Carbon::now()
					 ]; 		
			}
		}	

		DB::table('penilaian')->insert($insert);

		return redirect('penilaian');
	}

}
