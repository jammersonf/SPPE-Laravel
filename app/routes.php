<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'UserController@home');
Route::controller('user', 'UserController');
//sub-diretórios dos controllers
    //coord
    Route::controller('coordenador', 'coord\CoordenadorController');
    Route::controller('cadastro', 'coord\CadastroController');
    //prof
    Route::controller('professor', 'prof\ProfessorController');
    Route::controller('ensino', 'prof\EnsinoController');
    //Route::controller('aula', 'prof\AulaController');
    //aluno
    Route::controller('aluno', 'aluno\AlunoController');


Route::get('buscabase/{id}', function($id)
{
    return \Curso::find($id)->base;
});
