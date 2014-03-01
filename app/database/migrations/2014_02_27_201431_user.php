<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->string('email', 50);
            $table->integer('telefone');
            $table->string('username', 20);
            $table->string('password', 20);
            $table->string('perfil', 20);
            $table->datetime('dataCadastro');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
