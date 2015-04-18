<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilaiKtKaryawan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nilai_kt_karyawan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_karyawan')->unsigned();
			$table->integer('kt1')->unsigned();
			$table->integer('kt2')->unsigned();
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
		Schema::drop('nilai_kt_karyawan');
	}

}
