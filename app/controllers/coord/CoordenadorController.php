<?php namespace coord;

use BaseController, Session, Redirect, View, User, Coordenador;

class CoordenadorController extends BaseController
{
	private $id;

	public function __construct()
	{
		$this->id = Session::get('id');
	}

	public function getIndex()
	{
		return Redirect::to('coordenador/dashboard');
	}

	public function getDashboard()
    {
		return View::make('coordenador.dashboard');
	}

	public function getPerfil()
    {
		$usuario= \User::find($this->id);
		return View::make('coordenador.perfil', compact('usuario'));
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

	/**
	 * cursos ministrados pelo coordenador logado
	 *
	 * @return array
	**/

	private function getCurso()
	{
		return Coordenador::find($this->id)->cursos;
	}
}