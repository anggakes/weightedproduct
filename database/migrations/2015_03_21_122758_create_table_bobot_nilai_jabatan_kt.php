<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBobotNilaiJabatanKt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bobot_nilai_jabatan_kt', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_lowongan')->unsigned();
			$table->integer('kt1')->unsigned();
			$table->integer('kt2')->unsigned();
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
		Schema::drop('bobot_nilai_jabatan_kt');
	}

}
