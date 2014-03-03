<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avaliacao', function($table) {
            $table->increments('id');
            $table->string('conceito');
            $table->text('comentario');
            $table->integer('turma_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->datetime('dataAvaliacao');

            $table->foreign('turma_id')->references('id')->on('turma');
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
		Schema::drop('avaliacao');
	}

}
