<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App\Penilaian;
use DB;

class Karyawan extends Model {

	protected $table ='karyawan';
	protected $guarded =['id'];
	protected $fillable = [
		'nik',
		'nama',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'no_hp',
		'alamat',
		'tahun_masuk'
	];

	public function lamaBekerja(){
			$masuk = new DateTime($this->tahun_masuk);
			$keluar = new DateTime(date('Y-m-d'));

			$lama_kerja = $masuk->diff($keluar)->y;

			return $lama_kerja;
	}

	public function penilaian (){

		return $this->hasMany('App\Penilaian', 'id_karyawan');
	}

	public function getDataPeriode($id){
		return Penilaian::whereRaw("
					id_karyawan=$id")->groupBy("periode")->get();
	}
}
