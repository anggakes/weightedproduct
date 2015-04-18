<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App\ProfilSyaratKaryawan;
use App\NilaiKiKaryawan;
use App\NilaiKpKaryawan;
use App\NilaiKtKaryawan;
use DB;

class Karyawan extends Model {

	protected $table ='karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'nik',
		'nama',
		'agama',
		'alamat',
		'id_divisi'
	];

	public function lamaBekerja(){
			$masuk = new DateTime($this->profilSyaratKaryawan->tgl_masuk_kerja);
			$keluar = new DateTime(date('Y-m-d'));

			$lama_kerja = $masuk->diff($keluar)->y;

			return $lama_kerja;
	}

	

	public function profilSyaratKaryawan(){
		return $this->hasOne("App\ProfilSyaratKaryawan","id_karyawan"); 
	}

	public function nilaiKiKaryawan(){
		return $this->hasOne("App\NilaiKiKaryawan","id_karyawan");
	}

	public function nilaiKpKaryawan(){
		return $this->hasOne("App\NilaiKpKaryawan","id_karyawan");
	}

	public function nilaiKtKaryawan(){
		return $this->hasOne("App\NilaiKtKaryawan","id_karyawan");
	}

	public function saveNilai($data){
		
		$error = DB::transaction(function()use($data){
			$ki = NilaiKiKaryawan::firstOrNew(['id_karyawan'=>$this->id]);
			$ki->fill($data['ki']);
			$ki->save();
			$kp = NilaiKpKaryawan::firstOrNew(['id_karyawan'=>$this->id]);
			$kp->fill($data['kp']);
			$kp->save();
			$kt = NilaiKtKaryawan::firstOrNew(['id_karyawan'=>$this->id]);
			$kt->fill($data['kt']);
			$kt->save();
		});

		return $error;
	}
}
