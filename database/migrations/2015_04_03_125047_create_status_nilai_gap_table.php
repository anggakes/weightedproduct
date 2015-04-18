<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusNilaiGapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status_nilai_gap', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('selisih');
			$table->enum('status',['V','X']);
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
		Schema::drop('status_nilai_gap');
	}

}
