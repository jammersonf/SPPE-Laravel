<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		return View::make('login');
	}

	public function postSignin()
	{
		//verifica se os campos estão devidamente preenchidos
		$regras		= array(
			"login"=>"required",
			"senha"=>"required"
		);

		$validacao = Validator::make(Input::all(), $regras);

		if($validacao->fails()) {
			return Redirect::to('/')->withErrors($validacao);
		}

		//tenta logar o usuario
		$userdata	= array(
			'username'=>Input::get('login'),
			'password'=>Input::get('senha')
		);


		if (Auth::attempt($userdata) ) {
			return Redirect::to('aluno');

		} else {
		   return Redirect::to('/')
		      ->withErrors('Your username/password combination was incorrect');
		}
	}

}