<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBobotGapKt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bobot_gap_kt', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->integer('id_lowongan')->unsigned();
			$table->integer('kt1')->unsigned();
			$table->integer('kt2')->unsigned();
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
		Schema::drop('bobot_gap_kt');
	}

}
