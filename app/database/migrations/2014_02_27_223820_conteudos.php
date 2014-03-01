<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Conteudos extends Migration {

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
            $table->integer('planosEnsino_id')->unsigned();

            $table->foreign('planosEnsino_id')->references('id')->on('planosEnsino');
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
