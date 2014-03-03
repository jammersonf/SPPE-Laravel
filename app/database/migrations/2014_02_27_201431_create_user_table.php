<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->integer('telefone');
            $table->string('username');
            $table->string('password');
            $table->string('perfil');
            $table->datetime('dataCadastro');
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
		Schema::drop('user');
	}

}
