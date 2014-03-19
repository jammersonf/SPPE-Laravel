<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('base', function($table) {
            $table->increments('id');
            $table->string('nome_base');
            $table->integer('modulo');
            $table->integer('duracao');
            $table->integer('semana');
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('curso')->onDelete('CASCADE')->onUpdate('NO ACTION');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('base');
	}

}
