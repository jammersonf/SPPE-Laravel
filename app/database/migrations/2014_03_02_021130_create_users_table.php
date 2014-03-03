<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
	        $table->increments('id');
	        $table->string('nome', 200);
	        $table->string('telefone');
	        $table->string('username', 60)->unique();
	        $table->string('password', 60);
	        $table->string('perfil', 20);
	        $table->string('imagem', 60)->nullable();
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
	}

}
