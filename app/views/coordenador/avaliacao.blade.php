@extends('template.default')

@section('content')
<div class="ui grid" id="agregador">
	<div class="four wide column box" id="painel-abrir-avaliacao">

		<div class="ui stacked segment">

			<a class="ui right red corner label">
			    <i class="question icon"></i>
		  	</a> <!-- / icone de ajuda -->

			<div class="formulario-abrir-avaliacao">
				<div class="content">
					
					<div class="ui form">
						<div class="field">
							<label for="modulo">Selecione o módulo:</label>
							<div class="ui fluid selection dropdown">
								<div class="text">1</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item" data-value="1">1</div>
									<div class="item" data-value="2">2</div>
									<div class="item" data-value="3">3</div>
								</div>

							</div> <!-- / selection -->
						</div>

						<div class="field">
							<label for="data-inicial">Data de inicio:</label>
							<div class="ui icon input">
								<input type="text" name="data-inicial" id="data-inicial">
								<i class="calendar icon"></i>
							</div>
						</div>

						<div class="field">
							<label for="data-inicial">Data de termino:</label>
							<div class="ui icon input">
								<input type="text" name="data-final" id="data-final">
								<i class="calendar icon"></i>
							</div>
						</div>

						<div class="field">
							<label for="data-inicial">Selecione o curso:</label>
							<div class="ui fluid selection dropdown">
								<div class="text"></div>
								<i class="dropdown icon"></i>
								<div class="menu">
									@foreach ($cursos as $curso)
									<div class="item" data-value="{{$curso->id}}">{{$curso->curso}}</div>
									@endforeach
								</div>

							</div> <!-- / selection -->
						</div>

					</div> <!-- / form -->
					
				</div> <!-- /content -->
				<a href="#" class="btn fluid turquoise" id="btn-abrir-avaliacao">Abrir avaliação</a>
			</div>
		</div>
	</div>

	<div class="six wide column box drag-drop" id="cadastrar-perguntas">
		<div class="box-header">Anexar Pergunta 
			<div class="ui label">
  				<i class="tag icon"></i> 0
			</div>
		</div>
		<div class="box-content">
			<div class="ui stacked segment">
				<div class="drop-box">
					<div class="title">Arraste as perguntas do campo ao lado</div>
				</div>
				<div class="ui horizontal divider">ou</div>
				<a href="#" class="btn silver fluid">Adicionar nova pergunta</a>
			</div>
		</div>
	</div>

	div.

	<div class="five wide column box drag-drop" id="perguntas-disponiveis">
		<div class="box-header">Perguntas disponíveis</div>
		<div class="box-content">
			<div class="ui stacked segment">
				<div class="ui animated list lista-drag">
					@foreach ($perguntas_disponiveis as $pergunta)
					<div class="item">
						<div class="content">{{$pergunta["pergunta"]}}</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>

	<div class="twelve wide column box" id="avaliacoes-criadas">
		<div class="box-header">Avaliações Criadas</div>
		<div class="box-content">
			
			<div class="ui items">
				@foreach ($avaliacoes as $avaliacao)
					<div class="item">
						<div class="content">
							<div class="meta popup" data-content="" data-variation="" data-position="bottom center">
								<a class="ui 
								@if ($avaliacao['status']=='aberta') 
									{{'green'}} 
								@elseif ($avaliacao['status']=='pendente') 
									{{'orange'}}
								@elseif ($avaliacao['status']=='cancelada')
									{{'red'}}
								@endif
								label">{{$avaliacao['status']}}</a>
							</div>
							<div class="name">{{$avaliacao['curso']}}</div>
							<div class="description">
								<p>Módulo {{$avaliacao['modulo']}}</p>
								<p>Turno: {{$avaliacao['turno']}}</p>
								<p>Início: {{$avaliacao['inicio']}} </p>
								<p>Término: {{$avaliacao['fim']}} </p>
							</div>
						</div>
						<div class="ui bottom attached label center">
							<a href="javascript:void(0)" onclick="javascript:editarAvaliacao({{$avaliacao['id']}})" class="popup" data-content="Editar" data-variation="small" data-position="bottom center"><i class="circular pencil icon large"></i></a>
							<a href="#" class="popup" data-content="Visualizar" data-variation="small" avaliações" data-position="bottom center"><i class="circular comment icon large"></i></a>
						</div>		
					</div>
				@endforeach
			</div>

		</div>
	</div>		

</div>
<div class="ui modal">
	<i class="close icon"></i>
	<div class="header">
    	Editar avaliação
  	</div>
  	<div class="content">
    	<div class="left" style="width:200px">
      		<form action="" class="ui form" id="form-editar-avaliacao">
				<div class="field">
					<label>Modulo: </label>
					<div class="ui fluid selection dropdown" id="update-modulo">
						<div class="text">1</div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" data-value="1">1</div>
							<div class="item" data-value="2">2</div>
							<div class="item" data-value="3">3</div>
						</div>
					
					</div> <!-- / selection -->
				</div>

				<div class="field">
					<label>Turma: </label>
					<div class="ui fluid selection dropdown" id="update-turma">
						<div class="text">1</div>
						<i class="dropdown icon"></i>
						<div class="menu">
						</div>
					
					</div> <!-- / selection -->
				</div>

				<div class="field">
					<label>Início: </label>
					<div class="ui icon input">
						<input type="text" name="inicio" id="update-inicio">
						<i class="calendar icon"></i>
					</div>
				</div>

				<div class="field">
					<label>Termino: </label>
					<div class="ui icon input">
						<input type="text" name="termino" id="update-termino">
						<i class="calendar icon"></i>
					</div>
				</div>
      		</form>
    	</div>
    	<div class="right">
    		<div class="ui medium header">Perguntas</div>
    	</div>
  	</div>
	<div class="actions" style="margin:1em 0">
    	<a href="#" class="btn emerald">Salvar</a>
    </div>
</div>
@stop