<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_messages', function($table) {

            $table->create();

            $table->increments('id');

            $table->string('given_email');
            $table->string('given_name');
            $table->string('given_phone');
            $table->text('given_message');
            $table->string('user_id');
            $table->integer('active');
            $table->text('reply');
            $table->string('staff_id');

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
		Schema::drop('contact_messages');
	}

}
