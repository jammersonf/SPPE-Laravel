@extends('template.default')

@section('menu')
@include('professor.menu')
@stop

@section('content')
<ul class="vertical">
    <li><a href="/eter/public/aula"><i class=""></i>Planos de Aula</a></li>
    <li><a href="/eter/public/ensino"><i class=""></i>Planos de Ensino</a></li>
</ul>
@stop