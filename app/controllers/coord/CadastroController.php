<?php namespace coord;

/*
* Ao trabalhar com sub-diretório no laravel, se faz necessário usar o conceito de namespaces http://br2.php.net/namespaces
* no comando abaixo, está se fazendo uso das classes do laravel que estão no namespace '\'
*/
Use BaseController, Session, View, Input, Hash;

class CadastroController extends BaseController
{
    private $id;

    public function __construct()
    {
        $this->id = Session::get('id');
    }

    public function getIndex()
    {
        return View::make('coordenador.cadastro')->with('pagina', 'Cadastros');
    }

    public function getUsuario()
    {
        $pagina = "Cadastro de usuário";
        return View::make('coordenador.usuario')->with('pagina', $pagina);
    }

    //método para cadastro de usuário
    public function postCadusu()
    {
        //cadastra o usuário no banco
        $user = new \User;
        $user->nome     = Input::get('nome');
        $user->email    = Input::get('email');
        $user->telefone = Input::get('telefone');
        $user->username = Input::get('username');
        $user->password = Hash::make('30091992');
        $user->perfil   = Input::get('perfil');
        $user->save();

        return $this->getIndex();
    }

    public function getCurso()
    {
        $pagina = "Cadastro de curso";
        return View::make('coordenador.curso')->with('pagina', $pagina);
    }

    public function postCadcurso()
    {
        $curso = new \Curso;
        $curso->nome_curso  = Input::get('nome');
        $curso->eixo        = Input::get('eixo');
        $curso->user_id     = $this->id;
        $curso->save();

        return $this->getIndex();
    }

    public function getBase()
    {
        $data = array(
            'pagina'=> "Cadastro de base",
            'curso' => \Curso::all()
        );
        return View::make('coordenador.base', $data);
    }

    public function postCadbase()
    {
        $base = new \Base;
        $base->nome_base    = Input::get('nome');
        $base->modulo       = Input::get('modulo');
        $base->duracao      = Input::get('duracao');
        $base->semana       = Input::get('semana');
        $base->curso_id     = Input::get('curso');
        $base->save();

        return $this->getIndex();
    }

    public function getTurma()
    {
        $data = array(
            'pagina'=> "Cadastro de turma",
            'curso' => \Curso::all(),
            'user'  => \User::where('perfil', '=', 'professor')->get(),
            'base'  => \Base::all()
        );

        return View::make('coordenador.turma', $data);
    }

    public function postCadturma()
    {
        $turma = new \Turma;
        $turma->curso_id    = Input::get('curso');
        $turma->user_id     = Input::get('professor');
        $turma->periodo     = Input::get('periodo');
        $turma->base_id     = Input::get('base');
        $turma->turno       = Input::get('turno');
        $turma->save();

        return $this->getIndex();
    }

    //método que filtra as bases através do curso selecionado no cadastro de turma
    public function getBuscabase($id)
    {
        $curso = \Curso::find($id)->base;

        return $curso;
    }
}