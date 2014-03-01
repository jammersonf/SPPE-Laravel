<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CEspecificas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cEspecificas', function($table) {
            $table->increments('id');
            $table->text('conhecimento');
            $table->text('fazer');
            $table->text('agir');
            $table->text('ser');
            $table->text('estrategiasEnsino');
            $table->integer('numAulas');
            $table->string('semanaDatas', 50);
            $table->integer('conteudos_id')->unsigned();
            $table->foreign('conteudos_id')->references('id')->on('conteudos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cEspecificas');
	}

}
