@extends('template.default')

@section('menu')
	@include('professor.menu')
@stop

@section('content')
Curso Periodo Base Turno Enviar <br><br>
    @foreach($turma as $t)
        {{ $t->nome_curso }} {{ $t->periodo }} {{ $t->nome_base }}{{ $t->turno }}
<a href="{{ URL::to('/ensino/enviar/' . $t->id) }}">Enviar</a><br>
    @endforeach
@stop