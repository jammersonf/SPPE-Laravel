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
        @foreach($ensino as $e)
            {{ Form::open(array('url' => 'ensino/cadensino','class'=>'signin ui form')) }}
                {{ Form::textarea('competencias',$e->competencias) }}
                {{ Form::textarea('recursos',$e->recursos) }}
                {{ Form::textarea('avaliacao',$e->avaliacao) }}
                {{ Form::textarea('instrumentos',$e->instrumentos) }}
                {{ Form::textarea('acompanhamento',$e->acompanhamento) }}
                {{ Form::textarea('referencias',$e->referencias) }}
                {{ Form::hidden('tipo','altera') }}
                {{ Form::hidden('id', $e->id) }}
                {{ Form::hidden('turma', Request::segment(3)) }}
            <button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
            {{ Form::close() }}
        @endforeach
    @endforeach
@stop