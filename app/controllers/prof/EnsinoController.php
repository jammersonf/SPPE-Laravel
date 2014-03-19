<?php namespace prof;

Use BaseController, Session, View, Input, Hash;

class EnsinoController extends BaseController{

    private $id;
    private $turma;

    public function __construct()
    {
        $this->id   = Session::get('id');
        $this->turma = new \Turma();
    }

    public function getIndex()
    {
        $data['pagina'] = 'Turmas';
        $data['turma']  = $this->turma->busca_by_user();

        return View::make('professor.ensino', $data);
    }

    public function getEnviar($id)
    {
        //verifica se o id da turma(passado na url) está cadastrado no usuário logado
        $turma = $this->turma->verifica_turma($id);
        if(!empty($turma))
        {
            $data['turma'] = $this->turma->busca_by_id($id);

            $ensino = \PlanosEnsino::where('turma_id', '=', $id)->get();
            //verifica se o professor já começou a cadastrar o plano de ensino
            if(count($ensino) == 0)
            {
                //se  não, ele vai cadastrar normalmente
                return View::make('professor.enviar', $data);
            }else{
                //se for encontrado dados, ele vai preencher os campos
                $data['ensino'] = $ensino;
                return View::make('professor.upEnviar', $data);
            }

        }else{
            echo "sem permissão para visualizar ou cadastrar dados nessa turma";
        }

    }

    public function postCadensino()
    {
        $tipo   = Input::get('tipo');
        $id     = Input::get('id');
        if($tipo == 'cadastra')
        {
            $ensino = new \PlanosEnsino();
        }else if($tipo == 'altera'){
            $ensino = \PlanosEnsino::find($id);
        }

        $ensino->competencias   = Input::get('competencias');
        $ensino->recursos       = Input::get('recursos');
        $ensino->avaliacao      = Input::get('avaliacao');
        $ensino->instrumentos   = Input::get('instrumentos');
        $ensino->acompanhamento = Input::get('acompanhamento');
        $ensino->referencias    = Input::get('referencias');
        $ensino->data_plano     = date("Y-m-d h:i:s");
        $ensino->turma_id       = Input::get('turma');
        $ensino->save();

        return $this->getConteudos($ensino->id);
    }

    public function getConteudos($id)
    {
        $data['numero'] = \Conteudos::where('planos_ensino_id', '1')->get();
        $data['ensino'] = $id;
        $data['pagina'] = 'Cadastro de Conteúdos';
        return View::make('professor.conteudos', $data);
    }

    public function getEspecificas()
    {
        return View::make('professor.especificas');
    }

    public function postCadconteudo()
    {
        //inicia a transação para cadastrar dados em 2 tabelas
        \DB::transaction(function()
        {
            //pega os dados da tabela de conteúdos
            $cont = array(
                'titulo'    => Input::get('conteudo'),
                'numero'    => '1',
                'planos_ensino_id'=> Input::get('ensino')
            );

            //faz a inserção
            $conteudos = \Conteudos::create($cont);

            //pega os dados da tabela de c_especificas
            $espec = array(
                'conhecimento'  => Input::get('conhecimento'),
                'fazer'         => Input::get('fazer'),
                'agir'          => Input::get('agir'),
                'ser'           => Input::get('ser'),
                'estrategias_ensino'=> Input::get('estrategias'),
                'num_auals'     => Input::get('num'),
                'semana_datas'  => Input::get('semana'),
                'conteudos_id'  => $conteudos->id
            );
            //faz a inserção
            $especificas = \CEspecificas::create($espec);

            //caso tenha dado algum erro, entra na exceção
            if( !$especificas )
            {
                throw new \Exception('User not created for account');
            }
        });

        //se tudo tiver ok, retorna para conteudos com o conteúdo inserido
        return $this->getConteudos(Input::get('ensino'));
    }

}