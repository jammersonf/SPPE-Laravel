<?php

class UsuarioTableSeeder extends Seeder {
	
	public function run(){

	DB::table('usuario')->delete();

	$users = array(
		array(
			'nome'=>'Professor tal',
			'email'=>'Email tal',
			'telefone'=>'33221123',
			'login'=>'professor',
			'senha'=>Hash::make('123'),
			'perfil'=>'professor'
		),
		array(
			'nome'=>'Coordenador tal',
			'email'=>'Email tal',
			'telefone'=>'33221123',
			'login'=>'coordenador',
			'senha'=>Hash::make('123'),
			'perfil'=>'coordenador'
		),
		array(
			'nome'=>'Aluno tal',
			'email'=>'Email tal',
			'telefone'=>'33221123',
			'login'=>'aluno',
			'senha'=>Hash::make('123'),
			'perfil'=>'aluno'
		)
	);

	DB::table('usuario')->insert($users);	
	}
	
}