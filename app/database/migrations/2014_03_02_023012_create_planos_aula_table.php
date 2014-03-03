<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanosAulaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planos_aula', function($table) {
            $table->increments('id');
            $table->text('competencias');
            $table->text('conteudo');
            $table->text('metodologia');
            $table->text('recursos');
            $table->text('ambientacao');
            $table->text('tema_central');
            $table->timestamp('created_at');

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
		Schema::drop('planos_aula');
	}

}
