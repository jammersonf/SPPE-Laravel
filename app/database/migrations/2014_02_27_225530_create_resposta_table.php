<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resposta', function($table) {
            $table->increments('id');
            $table->text('titulo');
            $table->integer('pergunta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('pergunta_id')->references('id')->on('pergunta')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('CASCADE')->onUpdate('NO ACTION');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resposta');
	}

}
