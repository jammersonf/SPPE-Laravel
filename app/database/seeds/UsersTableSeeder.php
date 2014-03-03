<?php

class UsersTableSeeder extends Seeder {

    public function run(){

    DB::table('users')->delete();

    $users = array(
        array(
            'nome'=>'Professor tal',
            'username'=>'professor@tal.com',
            'telefone'=>'33221123',
            'password'=>Hash::make('123'),
            'perfil'=>'professor'
        ),
        array(
            'nome'=>'Coordenador tal',
            'username'=>'coodenador@tal.com',
            'telefone'=>'33221123',
            'password'=>Hash::make('123'),
            'perfil'=>'coordenador'
        ),
        array(
            'nome'=>'Aluno tal',
            'username'=>'aluno@tal.com',
            'telefone'=>'33221123',
            'password'=>Hash::make('123'),
            'perfil'=>'aluno'
        )
    );

    DB::table('users')->insert($users);
    }

}