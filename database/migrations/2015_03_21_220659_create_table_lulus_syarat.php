<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLulusSyarat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lulus_syarat', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->integer('id_lowongan')->unsigned();
			$table->timestamps();

			$table->foreign('id_karyawan')
      		->references('id')->on('karyawan')
      		->onDelete('cascade');

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
		Schema::drop('lulus_syarat');
	}

}
