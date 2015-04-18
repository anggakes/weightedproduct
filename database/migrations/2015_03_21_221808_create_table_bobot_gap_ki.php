<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBobotGapKi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bobot_gap_ki', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->integer('id_lowongan')->unsigned();
			$table->integer('ki1')->unsigned();
			$table->integer('ki2')->unsigned();
			$table->integer('ki3')->unsigned();
			$table->integer('ki4')->unsigned();
			$table->integer('ki5')->unsigned();
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
		Schema::drop('bobot_gap_ki');
	}

}
