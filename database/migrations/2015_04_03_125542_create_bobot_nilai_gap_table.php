<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotNilaiGapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bobot_nilai_gap', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('selisih');
			$table->float('bobot');
			$table->string('keterangan',255);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bobot_nilai_gap');
	}

}
