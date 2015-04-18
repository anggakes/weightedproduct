<?php namespace App\Libraries;

use DB;
use App\ProfilSyaratJabatan;
use Carbon\Carbon;
use App\ProfilSyaratKaryawan;
use App\LulusSyarat;
use App\Lowongan;

class SeleksiLulusSyarat{

	public $statusGap;
	public $id_lowongan;
	public $syaratJabatan;
	

	public function __construct($id_lowongan){
		$this->id_lowongan= $id_lowongan;
		
		$this->setSyaratJabatan();
		
	}

	public function setStatusGap(){

		$this->statusGap = DB::table('status_nilai_gap')->get();

		return $this->statusGap;
	}

	public function perbandingkanSelisihStatusGap($selisih){
		$idx = -1;
		foreach ($this->statusGap as $key => $value) {
			if($value->selisih == $selisih){
				$idx = $key;
			}
		}

		return $this->statusGap[$idx]->status;
	}

	public function setSyaratJabatan(){
		$this->syaratJabatan = ProfilSyaratJabatan::where('id_lowongan','=',$this->id_lowongan)->first();
		return $this->syaratJabatan;
	}

	public function lulusSyarat(){
		 $tglMin = Carbon::now()->subYears($this->syaratJabatan->pengalaman_kerja)->toDateString();
		 $pendidikanMin = $this->syaratJabatan->pendidikan_terakhir;

		$lulus = ProfilSyaratKaryawan::where('tgl_masuk_kerja','<=',$tglMin)->where('nilai_pendidikan_terakhir','>=',$pendidikanMin);
		$query = '';
		$lowongan = Lowongan::find($this->id_lowongan);
		foreach ($lowongan->jabatan->divisi as $key => $value) {
			$query .= " id_divisi = $value->id OR";
		}

		$lulus = $lulus->whereRaw(substr($query,0,-2));
		
		return $lulus->get();
	}

	//fungsi untuk menyimpan peserta yang lulus syarat

	public function saveLulusSyarat(){

		$lulus = $this->lulusSyarat();
		foreach ($lulus as $key => $value) {
			$insert[] =[
				'id_lowongan' => $this->id_lowongan,
				'id_karyawan' => $value->id_karyawan
			];
		}

		DB::table('lulus_syarat')->where('id_lowongan','=',$this->id_lowongan)->delete();
		DB::table('lulus_syarat')->insert($insert);
		return $insert;
	}

	
	// FUngsi untuk menampilkan tabel

	public function buatTabelPenilaianProfilSyaratUntukPengelompokanGap(){
		
		$lulus = LulusSyarat::where('id_lowongan','=',$this->id_lowongan)->get();
		$data['profil_syarat_karyawan']['pendidikan_terakhir'] = $this->syaratJabatan->pendidikan_terakhir;
		$data['profil_syarat_karyawan']['pengalaman_kerja'] = $this->syaratJabatan->pengalaman_kerja;
		
		foreach ($lulus as $key => $value) {
			$data['karyawan'][] = $value->karyawan->nama;
			$pendidikan = $this->convertPendidikan($value->karyawan->profilSyaratKaryawan->pendidikan_terakhir);
			$pengalaman = $this->convertPengalaman($value->karyawan->lamaBekerja());
			$data["pendidikan_terakhir"]['profil_syarat_karyawan'][] = $pendidikan;
			$data['pengalaman_kerja']['profil_syarat_karyawan'][] = $pengalaman;
			$data['pendidikan_terakhir']['gap'][] = $pendidikan - $this->syaratJabatan->pendidikan_terakhir;
			$data['pengalaman_kerja']['gap'][] = $pengalaman - $this->syaratJabatan->pengalaman_kerja;
		}

		return $data;
	}

	public function buatTabelKeteranganStatusProfilSyaratKaryawanHasilPemetaanGap(){
		$this->setStatusGap();
		$lulus = $this->buatTabelPenilaianProfilSyaratUntukPengelompokanGap();

		$data['karyawan']=$lulus['karyawan'];
		foreach ($lulus['pendidikan_terakhir']['gap'] as $key => $value) {
			$data['pendidikan_terakhir'][] = $this->perbandingkanSelisihStatusGap($value);
		}
		foreach ($lulus['pengalaman_kerja']['gap'] as $key => $value) {
			$data['pengalaman_kerja'][] = $this->perbandingkanSelisihStatusGap($value);
		}
		return $data;

	}

	private function convertPendidikan($nilai){
		$return = 1;

		switch ($nilai) {
			case 'SMA':
				$return = 1;
				break;
			case 'D1':
				$return = 2;
				break;
			case 'D2':
				$return = 2;
				break;
			case 'D3':
				$return = 2;
				break;
			case 'S1':
				$return = 3;
				break;
			case 'S2':
				$return = 4;
				break;
			case 'S3':
				$return = 5;
				break;
		}

		return $return;
	}

	private function convertPengalaman($nilai){
		$return = 1;

		switch ($nilai) {
			case ($nilai<=1):
				$return = 1;
				break;
			case ($nilai>1 And $nilai<=2):
				$return = 2;
				break;
			case ($nilai>2 And $nilai<=3):
				$return = 3;
				break;
			case ($nilai>3 And $nilai<=4):
				$return = 4;
				break;
			case ($nilai>=5) :
				$return = 5;
			break;
		}

		return $return;
	}


}