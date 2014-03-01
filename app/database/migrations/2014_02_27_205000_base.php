<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Base extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('base', function($table) {
            $table->increments('id');
            $table->string('nomeBase', 50);
            $table->integer('modulo');
            $table->integer('duracao');
            $table->integer('semana');
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('curso');

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
