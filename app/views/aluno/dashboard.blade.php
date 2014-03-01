@extends('template.default')

@section('content')
<div class="ui celled grid" id="agregador">
	<div class="row">

		<div class="three wide column box" style="">
    		<div class="ui raised segment box-0">
    			<div class="ui teal ribbon label ">Nova avaliação</div>
    			<div class="box-content">
    				<div class="ui selection dropdown" id="lista-professor">
    					<div class="text">Selecione o professor:</div>
    					<i class="dropdown icon"></i>
    					<div class="menu">
    						@foreach ($professores as $prof)
    							<div class="item">{{ $prof->nome }}</div>
    						@endforeach
    					</div>
    				</div>
    				<div class="fluid ui small button" id="btn-avaliar">Avaliar</div>
    			</div>
    		</div>
    	</div>

    	<div class="seven wide column box" style="">
    		<div class="ui stacked segment box-0">
    			<div class="ui teal ribbon label">Últimas avaliações</div>
    		</div>
    	</div>

    	<div class="two wide column box">
     		<div class="ui raised segment box-0">
     			<div class="box-content">
     				<span class="numero">27</span>
     			</div>
     			<div class="ui red ribbon label">Dias restantes</div>
     		</div>
    	</div>

	</div>

	<div class="row">
		<div class="nine wide column box">
			<div class="ui raised segment box-0">
				<div class="box-content">
				</div>
			</div>
		</div>

		<div class="one wide column box">
			<div class="row">
				<div class="one wide column box box-btn popup" data-content="Exportar relatório geral" data-variation="inverted">
					<div class="ui raised segment box-1">
						<div class="box-content">
							<i class="attachment icon big"></i>
						</div>
					</div>
				</div>
			</div>

				<div class="one wide column box box-btn popup" data-content="Deletar avaliação" data-variation="inverted" style="margin-top:1em">
					<div class="ui raised segment box-1">
						<div class="box-content">
							<i class="trash icon big"></i>
						</div>
					</div>
				</div>
		</div>

		<div class="one wide column box">
			<div class="ui raised segment box-0">
				<div class="ui right blue corner label">
				    <i class="question icon"></i>
			  	</div>
				<div class="box-content">
					<i class="user icon" style="font-size:50pt"></i>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /agregador -->
@stop