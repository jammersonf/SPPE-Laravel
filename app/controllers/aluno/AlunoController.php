<?php namespace aluno;

class AlunoController extends \BaseController
{
	private $id;

	public function __construct()
	{
		$this->id = Session::get('user');
	}

	public function getIndex()
	{
		return Redirect::to('aluno/dashboard');
	}

	public function getDashboard()
	{
		$data = array(
			"professores"=>$this->getProfessores(),
			"pagina"=>"Dashboard"
		);
		return View::make('aluno.dashboard',$data);
	}

	// retorna todos os professores que ministram aulam na mesma turma do aluno
	public function getProfessores()
	{
		$consulta = DB::table('professor')
		 	->join('grupo',function($join) {
		 		$join->on('professor.id','=','grupo.professor_id')
		 			->where('grupo.turma_id','=',Aluno::find($this->id)->turma->id);
		 	})
		 	->select('professor.nome')
		 	->get();

		return $consulta;
	}
}