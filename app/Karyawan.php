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
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'no_hp',
		'alamat',
		'tahun_masuk'
	];

}
