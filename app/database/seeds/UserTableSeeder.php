<?php

class UserTableSeeder extends Seeder {
	
	public function run(){

	DB::table('user')->delete();

	$users = array(
		array(
			'nome'=>'Professor tal',
			'email'=>'tal@tal.com',
			'telefone'=>'33221123',
			'username'=>'professor',
			'password'=>Hash::make('123'),
			'perfil'=>'professor'
		),
		array(
			'nome'=>'Coordenador tal',
			'email'=>'tal@tal.com',
			'telefone'=>'33221123',
			'username'=>'coordenador',
			'password'=>Hash::make('123'),
			'perfil'=>'coordenador'
		),
		array(
			'nome'=>'Aluno tal',
			'email'=>'tal@tal.com',
			'telefone'=>'33221123',
			'username'=>'aluno',
			'password'=>Hash::make('123'),
			'perfil'=>'aluno'
		)
	);

	DB::table('user')->insert($users);	
	}
	
}