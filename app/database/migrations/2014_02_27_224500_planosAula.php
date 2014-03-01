<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanosAula extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planosAula', function($table) {
            $table->increments('id');
            $table->text('competencias');
            $table->text('conteudo');
            $table->text('metodologia');
            $table->text('recursos');
            $table->text('ambientacao');
            $table->text('temaCentral');
            $table->datetime('dataPlano');
            $table->integer('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')->on('turma');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('planosAula');
	}

}
