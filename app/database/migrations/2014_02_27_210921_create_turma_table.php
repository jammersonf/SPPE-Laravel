<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration {

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
            $table->string('periodo');
            $table->integer('base_id')->unsigned();
            $table->string('turno');

            $table->foreign('curso_id')->references('id')->on('curso')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('base_id')->references('id')->on('base')->onDelete('CASCADE')->onUpdate('NO ACTION');
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
