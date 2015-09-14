<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupInitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('role');
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('password_resets', function(Blueprint $table)
		{
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});

		Schema::create('degrees', function(Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->boolean('coop');
			$table->boolean('honors');
			$table->string('type');
			$table->timestamps();
		});

		Schema::create('courses', function(Blueprint $table){
			$table->increments('id');
			$table->string('department');
			$table->integer('number');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
		});

		Schema::create('degree_requirements', function(Blueprint $table){
			$table->increments('id');
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
		Schema::drop('users');
		Schema::drop('password_resets');
		Schema::drop('degrees');
		Schema::drop('courses');
		Schema::drop('degree_requirements');
	}
}
