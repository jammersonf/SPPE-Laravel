<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Resposta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resposta', function($table) {
            $table->increments('id');
            $table->text('titulo');
            $table->timestamp('timestamp');
            $table->integer('pergunta_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('pergunta_id')->references('id')->on('pergunta');
            $table->foreign('user_id')->references('id')->on('user');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resposta');
	}

}
