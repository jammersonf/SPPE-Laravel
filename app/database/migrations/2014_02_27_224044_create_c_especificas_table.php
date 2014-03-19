<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEspecificasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('c_especificas', function($table) {
            $table->increments('id');
            $table->text('conhecimento');
            $table->text('fazer');
            $table->text('agir');
            $table->text('ser');
            $table->text('estrategias_ensino');
            $table->integer('num_aulas');
            $table->string('semana_datas');
            $table->integer('conteudos_id')->unsigned();
            $table->foreign('conteudos_id')->references('id')->on('conteudos')->onDelete('CASCADE')->onUpdate('NO ACTION');
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
