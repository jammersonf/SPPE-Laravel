@extends('template.default')

@section('menu')
	@include('coordenador.menu')
@stop

@section('content')
<ul>
    <li><a href="/eter/public/cadastro/usuario"><i class=""></i>Usuário</a></li>
    <li><a href="/eter/public/cadastro/curso"><i class=""></i>Curso</a></li>
    <li><a href="/eter/public/cadastro/base"><i class=""></i>Base</a></li>
    <li><a href="/eter/public/cadastro/turma"><i class=""></i>Turma</a></li>
</ul>
@stop