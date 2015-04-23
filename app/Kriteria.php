<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model {

	//
	protected $table ='kriteria';
	protected $guarded =['id'];
	protected $fillable = [
		'nama',
		'kode',
		'bobot'
	];

	public function nilaiKriteria(){
		return $this->hasMany('App\NilaiKriteria', 'id_kriteria');
	}
}
