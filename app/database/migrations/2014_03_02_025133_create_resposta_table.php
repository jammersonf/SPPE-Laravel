<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resposta', function($table) {
            $table->increments('id');
			$table->integer('pergunta_id')->unsigned();
			$table->integer('professor_id')->unsigned();
			$table->integer('conceito');
			$table->text('comentario');
			$table->integer('aluno_id')->unsigned();
			$table->timestamp('created_at');

			$table->foreign('pergunta_id')->references('id')->on('pergunta');
			$table->foreign('professor_id')->references('id')->on('users');
			$table->foreign('aluno_id')->references('id')->on('users');
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
