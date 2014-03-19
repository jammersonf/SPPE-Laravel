@extends('template.default')

@section('menu')
    @include('coordenador.menu')
@stop

@section('content')
{{ $usuario }}
@stop