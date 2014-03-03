<?php 

use Carbon\Carbon;

class ProfessorController extends BaseController
{
	private $id;

	public function __construct()
	{
		$this->id = Session::get('user');
	}

	public function getIndex()
	{
		return Redirect::to('coordenador/dashboard');
		
	}

	// Página de visualização de gráficos, icones rápidos.. (coordenador/dashboard)
	public function getDashboard()
	{
		return View::make('coordenador.dashboard')->with("pagina", "Dashboard");
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

	/**
	 * avaliacoes já criadas pelo coordenador logado
	 *
	 * @return array
	**/

	private function getAvaliacoesCriadas()
	{
		$cursos = $this->getCurso();
		$avaliacoes = array();

		foreach ($cursos as $curso) {
			// percorre as turmas pertencentes ao curso
			foreach ($curso->turmas as $turma) {
				// percorre as avaliacaoes cadastradas para a turma atual
				foreach ($turma->avaliacoes as $avaliacao) {
					$avaliacoes[] = array(
						"id"=>$avaliacao->id,
						"curso"=>$curso->curso,
						"turno"=>$turma->turno,
						"modulo"=>$avaliacao->modulo,
						"inicio"=>$avaliacao->inicio,
						"fim"=>$avaliacao->fim,
						"criada"=>Carbon::createFromTimeStamp(strtotime($avaliacao->created_at))->diffForHumans(),
						"status"=>"aberta"
					);
				}
			}
		}

		return $avaliacoes;
	}

	public function getInfoavaliacao()
	{
		$id = $_GET["avaliacao"];
		$avaliacao = array(
			"info"=>Avaliacao::find($id)->toArray(),
			"perguntas"=>""
		);

		return $avaliacao;
	}

	private function getPerguntasDisponiveis()
	{
		return Pergunta::all()->toArray();
	}
}