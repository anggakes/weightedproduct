<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\HttpResponse;

use App\Libraries\ProfileMatching;
use DB;
use App\LulusSyarat;

class StepByStepController extends Controller {

	

	public function getGap($id_lowongan){

		$bobot = $this->getMakeBobot($id_lowongan);
 
		$nilai = $this->getMakeKaryawan($id_lowongan);


		$pm = new ProfileMatching($id_lowongan,$bobot,$nilai);
		$data['ki'] = $pm->gapKi();
		$data['kp'] = $pm->gapKp();
		$data['kt'] = $pm->gapKt();
		$lulus = LulusSyarat::where("id_lowongan",'=',$id_lowongan)->get();

		return view('stepbystep.gap')
		->with('data',$data)
		->with('nilai',$nilai)
		->with('lulus',$lulus)
		->with('bobot',$bobot)
		->with('id_lowongan',$id_lowongan);
	}

	public function getConvertgap($id_lowongan){

		$bobot = $this->getMakeBobot($id_lowongan);
 
		$nilai = $this->getMakeKaryawan($id_lowongan);


		$pm = new ProfileMatching($id_lowongan,$bobot,$nilai);
		$data['ki'] = $pm->convertGap($pm->gapKi());
		$data['kp'] = $pm->convertGap($pm->gapKp());
		$data['kt'] = $pm->convertGap($pm->gapKt());
		$lulus = LulusSyarat::where("id_lowongan",'=',$id_lowongan)->get();

		return view('stepbystep.convertgap')
		->with('data',$data)
		->with('nilai',$nilai)
		->with('lulus',$lulus)
		->with('bobot',$bobot)
		->with('id_lowongan',$id_lowongan);
	}

	public function getCoreSecondaryFactor($id_lowongan){

		$bobot = $this->getMakeBobot($id_lowongan);
 
		$nilai = $this->getMakeKaryawan($id_lowongan);


		$pm = new ProfileMatching($id_lowongan,$bobot,$nilai);
		$data = $pm->coreSecondaryFactor();
		$lulus = LulusSyarat::where("id_lowongan",'=',$id_lowongan)->get();

		return view('stepbystep.coresecondaryfactor')
		->with('data',$data['coresec'])
		->with('lulus',$lulus)
		->with('id_lowongan',$id_lowongan);
	}

	public function getTotalKompetensi($id_lowongan){

		$bobot = $this->getMakeBobot($id_lowongan);
 
		$nilai = $this->getMakeKaryawan($id_lowongan);


		$pm = new ProfileMatching($id_lowongan,$bobot,$nilai);
		$data = $pm->coreSecondaryFactor();
		$lulus = LulusSyarat::where("id_lowongan",'=',$id_lowongan)->get();

		return view('stepbystep.totalkompetensi')
		->with('data',$data['total'])
		->with('lulus',$lulus)
		->with('id_lowongan',$id_lowongan);
	}

		public function getMakeBobot($id_lowongan){
		$data = array();

		$ki = (array) DB::table('bobot_nilai_jabatan_ki')->select('ki1','ki2','ki3','ki4','ki5')->where('id_lowongan','=',$id_lowongan)->first();
		$kp = (array) DB::table('bobot_nilai_jabatan_kp')->select('kp1','kp2','kp3')->where('id_lowongan','=',$id_lowongan)->first();
		$kt = (array) DB::table('bobot_nilai_jabatan_kt')->select('kt1','kt2')->where('id_lowongan','=',$id_lowongan)->first();
		foreach ($ki as $key => $value) {
			$data['ki'][] = $value;
		}
		foreach ($kp as $key => $value) {
			$data['kp'][] = $value;
		}
		foreach ($kt as $key => $value) {
			$data['kt'][] = $value;
		}
		/*$bobot = [
			"ki"=>[5,6,6,5,5],
			"kp"=>[4,4,5],
			"kt"=>[5,5]
		];*/
		return ($data);
	}

	public function getMakeKaryawan($id_lowongan){
	/*	
		$nilai = [
			[
				"ki"=>[5,4,6,5,5],
				"kp"=>[4,4,5],
				"kt"=>[2,5]
			],
			 [
				"ki"=>[5,3,1,5,5],
				"kp"=>[2,4,5],
				"kt"=>[5,4]
			],
			[
				"ki"=>[5,6,3,3,3],
				"kp"=>[4,1,2],
				"kt"=>[1,1]
			],

		];
	*/
		$lulus = LulusSyarat::where("id_lowongan",'=',$id_lowongan)->get();
		$data=array();
		foreach ($lulus as $key => $value) {

			$data[$key]['ki'][] = $value->karyawan->nilaiKiKaryawan->ki1;
			$data[$key]['ki'][] = $value->karyawan->nilaiKiKaryawan->ki2;
			$data[$key]['ki'][] = $value->karyawan->nilaiKiKaryawan->ki3;
			$data[$key]['ki'][] = $value->karyawan->nilaiKiKaryawan->ki4;
			$data[$key]['ki'][] = $value->karyawan->nilaiKiKaryawan->ki5;


			$data[$key]['kp'][] = $value->karyawan->nilaiKpKaryawan->kp1;
			$data[$key]['kp'][] = $value->karyawan->nilaiKpKaryawan->kp2;
			$data[$key]['kp'][] = $value->karyawan->nilaiKpKaryawan->kp3;

			$data[$key]['kt'][] = $value->karyawan->nilaiKtKaryawan->kt1;
			$data[$key]['kt'][] = $value->karyawan->nilaiKtKaryawan->kt2;


		}
		return($data);
	}

}
