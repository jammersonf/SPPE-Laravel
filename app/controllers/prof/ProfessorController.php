<?php namespace prof;

use BaseController, Session, Redirect, View, User, Coordenador;

class ProfessorController extends BaseController
{
	private $id;

	public function __construct()
	{
		$this->id = Session::get('id');
	}

	public function getIndex()
	{
		return Redirect::to('professor/dashboard');
	}

	// Página de visualização de gráficos, icones rápidos.. (coordenador/dashboard)
	public function getDashboard()
	{
		return View::make('professor.dashboard')->with("pagina", "Dashboard");
	}

    public function getCadastro()
    {
        return View::make('professor.cadastro');
    }

	//carregar dados do perfil, para usuário poder visualisar ou alterar
	public function getPerfil()
    {
		$usuario= \User::find($this->id);
		return View::make('professor.perfil', compact('usuario'));
	}

	// Página de criação e visualização das avaliações (coordenador/avaliacao)
	public function getAvaliacao()
	{
		$avaliacoes = $this->getAvaliacoesCriadas();
		$cursos = Coordenador::find($this->id)->cursos;
		$perguntas_disponiveis = $this->getPerguntasDisponiveis();
		$pagina= "Avaliações";

		return View::make('coordenador.avaliacao',compact('avaliacoes','cursos','pagina','perguntas_disponiveis'));
	}
}