<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Turma extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turma', function($table) {
            $table->increments('id');
            $table->integer('curso_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('periodo', 6);
            $table->integer('base_id')->unsigned();
            $table->string('turno', 10);

            $table->foreign('curso_id')->references('id')->on('curso');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('base_id')->references('id')->on('base');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('turma');
	}

}
