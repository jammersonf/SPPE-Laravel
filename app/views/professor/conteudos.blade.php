@extends('template.default')

@section('menu')
@include('professor.menu')
@stop
@section('content')
ahsuashu{{ $numero }}
<a href="{{ URL::to('/ensino/especificas/'.$ensino) }}" rel="facebox">Enviar</a><br>
@stop