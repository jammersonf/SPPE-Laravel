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
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function getIndex()
    {
        return View::make('login');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function postSignin()
    {
        //verifica se os campos estão devidamente preenchidos
        $regras = array(
            "email"=>"required",
            "senha"=>"required"
        );

        $validacao = Validator::make(Input::all(), $regras);

        if($validacao->fails()) {
            return Redirect::to('/')->withErrors($validacao);
        }

        //tenta logar o usuario
        $userdata   = array(
            'username'=>Input::get('email'),
            'password'=>Input::get('senha')
        );


        if (Auth::attempt($userdata) ) {

        //cria sessão do usuário e direciona para o perfil correspondente
        Session::put('nome', Auth::user()->nome);
        Session::put('user', Auth::user()->username);

        $perfil = Auth::user()->perfil;

        if($perfil == 'aluno'){
            return Redirect::to('aluno');

        }else if($perfil == 'coordenador'){
            return Redirect::to('coordenador');

        }else if($perfil == 'professor'){
            return Redirect::to('professor');

        }

        } else {
           return Redirect::to('/')
              ->withErrors('Your username/password combination was incorrect');
        }
    }


}