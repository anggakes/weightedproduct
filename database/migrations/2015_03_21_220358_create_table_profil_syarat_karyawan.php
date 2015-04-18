<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfilSyaratKaryawan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profil_syarat_karyawan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->enum('pendidikan_terakhir',['SMA','D1','D2','D3','S1','S2','S3']);
			$table->date('tgl_masuk_kerja');
			$table->timestamps();
			$table->integer('nilai_pendidikan_terakhir');
			
			$table->foreign('id_karyawan')
      		->references('id')->on('karyawan')
      		->onDelete('cascade');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profil_syarat_karyawan');
	}

}
