<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilaiKpKaryawan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nilai_kp_karyawan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->integer('kp1')->unsigned();
			$table->integer('kp2')->unsigned();
			$table->integer('kp3')->unsigned();
			$table->timestamps();

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
		Schema::drop('nilai_kp_karyawan');
	}

}
