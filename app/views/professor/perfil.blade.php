@extends('template.default')

@section('menu')
	@include('professor.menu')
@stop

@section('content')
{{ $usuario }}
@stop