<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pergunta', function($table) {
            $table->increments('id');
            $table->text('titulo');
            $table->integer('status');
            $table->integer('avaliacao_id')->unsigned();
            $table->timestamps();

            $table->foreign('avaliacao_id')->references('id')->on('avaliacao')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pergunta');
	}

}
