<?php

use Illuminate\Database\Migrations\Migration;

class CreateGirlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('girls', function($table)
		{
			$table->increments('id');
			$table->integer('year')->nullable();
			$table->integer('month')->nullable();
			$table->integer('day')->nullable();
			$table->string('name')->nullable()->index();
			$table->string('kana')->nullable()->index();
			$table->timestamps();

			$table->index(array('month', 'day'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('girls');
	}

}