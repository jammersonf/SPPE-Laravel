@extends('template.default')

@section('menu')
	@include('coordenador.menu')
@stop

@section('content')
<?php
    foreach($curso as $c){
            $array_curso[$c->id] = $c->nome_curso;
    }
    array_unshift($array_curso, 'Curso');
?>
@if ( count($errors) > 0)
ERROS econtrados:<br />
<ul>
    @foreach($errors->all() as $e)
    <li>{{ $e}}</li>
    @endforeach
</ul>
@endif
    {{ Form::open(array('url' => 'cadastro/cadbase','class'=>'signin ui form')) }}
        {{ Form::text('nome',null,array('placeholder'=>'Base')) }}
        Módulo: I {{ Form::radio('modulo', '1');}} II {{ Form::radio('modulo', '2') }}  III {{ Form::radio('modulo', '3') }}
        {{ Form::text('duracao',null,array('placeholder'=>'Duração')) }}
        {{ Form::text('semana',null,array('placeholder'=>'Semana')) }}
    {{ Form::select('curso', $array_curso); }}

<button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
    {{ Form::close() }}
@stop