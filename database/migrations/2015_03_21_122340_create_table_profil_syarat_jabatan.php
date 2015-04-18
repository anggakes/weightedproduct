<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfilSyaratJabatan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profil_syarat_jabatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_lowongan')->unsigned();
			$table->string('pendidikan_terakhir');
			$table->string('pengalaman_kerja');
			$table->timestamps();

			$table->foreign('id_lowongan')
      		->references('id')->on('lowongan')
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
		Schema::drop('profil_syarat_jabatan');
	}

}
