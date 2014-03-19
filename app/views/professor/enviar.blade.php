@extends('template.default')

@section('menu')
	@include('professor.menu')
@stop

@section('content')
    Escola Técnica Redentorista<br>
    Planejamento de Ensino <br><br>

    @foreach($turma as $t)
        Eixo: {{ $t->eixo }}<br>
        Curso: {{ $t->nome_curso }}<br>
        Semestre: {{ $t->periodo }}<br>
        Módulo: {{ $t->modulo }}<br>
        Base Tecnológica: {{ $t->nome_base }}<br>
        Carga Horária: {{ $t->duracao }} horas aula<br>
        Distribuição de Turmas: {{ $t->turno }}<br>
        Professor(a): {{ $t->nome }}<br>
    @endforeach
    {{ Form::open(array('url' => 'ensino/cadensino','class'=>'signin ui form')) }}
        {{ Form::textarea('competencias',null,array('placeholder'=>'Competências Gerais para a formação do perfil no Módulo')) }}
        {{ Form::textarea('recursos',null,array('placeholder'=>'Recursos didáticos utilizados')) }}
        {{ Form::textarea('avaliacao',null,array('placeholder'=>'Critéris de avaliaçao')) }}
        {{ Form::textarea('instrumentos',null,array('placeholder'=>'Instruments de avaliação')) }}
        {{ Form::textarea('acompanhamento',null,array('placeholder'=>'Acompanhamento da execução da Base (auto-avaliação):')) }}
        {{ Form::textarea('referencias',null,array('placeholder'=>'Referências Bibliográficas (Bibliografia Básica):')) }}
        {{ Form::hidden('tipo','cadastra') }}
        {{ Form::hidden('turma', Request::segment(3)) }}
    <button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
    {{ Form::close() }}

@stop