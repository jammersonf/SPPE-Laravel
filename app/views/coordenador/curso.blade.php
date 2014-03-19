@extends('template.default')

@section('menu')
	@include('coordenador.menu')
@stop

@section('content')
@if ( count($errors) > 0)
ERROS econtrados:<br />
<ul>
    @foreach($errors->all() as $e)
    <li>{{ $e}}</li>
    @endforeach
</ul>
@endif
    {{ Form::open(array('url' => 'cadastro/cadcurso','class'=>'signin ui form')) }}
        {{ Form::text('nome',null,array('placeholder'=>'Curso')) }}
        {{ Form::text('eixo',null,array('placeholder'=>'eixo')) }}

<button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
    {{ Form::close() }}
@stop