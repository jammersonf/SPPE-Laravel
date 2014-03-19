<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conteudos', function($table) {
            $table->increments('id');
            $table->text('titulo');
            $table->integer('numero');
            $table->integer('planos_ensino_id')->unsigned();

            $table->foreign('planos_ensino_id')->references('id')->on('planos_ensino')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conteudos');
	}

}
