<?php

class UserController extends BaseController {

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

		//tenta logar o usuario
		$userdata = array(
			'emaill'=>Input::get('username'),
			'password'=>Input::get('password')
		);


		if (Auth::attempt($userdata) ) {
			$login = Auth::user()->login;
			$perfil = Auth::user()->perfil;
			
			return Redirect::to('aluno');

		} else {
		   return Redirect::to('erro')
		      ->with('message', 'Your username/password combination was incorrect')
		      ->withInput();
		}
	}

}