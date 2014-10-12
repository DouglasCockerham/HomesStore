<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_methods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('category');
			$table->string('type');
			$table->string('data');
			$table->integer('priority');
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
		Schema::drop('contact_methods');
	}

}
