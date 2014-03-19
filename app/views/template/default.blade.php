<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>SOAD</title>
    <script src="{{ asset('/javascript/jquery-1.10.1.min.js') }} "></script>
    <script src="{{ asset('/javascript/semantic.min.js') }} "></script>
    <script>var url = "http://localhost:8000/"</script>
    <script src="{{ asset('/javascript/soad.js') }} "></script>
    <script src="{{ asset('/packages/facebox/src/facebox.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/packages/facebox/src/facebox.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/semantic.min.css') }} " />
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/estilo.css')}} " />
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/simple-line-icons.css')}} " />
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage : "{{ asset('/packages/facebox/src/loading.gif') }}",
                closeImage   : "{{ asset('/packages/facebox/src/closelabel.png') }}"
            })
        })
    </script>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'> -->
</head>
<body>

	<div class="ui grid wrap">
		<div class="wide column" id="menu-lateral">
			<div class="profile">
				<?php $sessao = Session::get("user") ?>
				<img class="circular ui image" src="{{ asset('/images/photo2.jpg')}}">

				{{-- exibe apenas o primeiro nome do usuário --}}
				<span class="nome">{{ ucWords($sessao) }}</span>
				<span class="tipo">{{ ucfirst(Request::segment(1)); }}</span>
			</div>
			@yield('menu')

		</div> <!-- /menu-lateral -->

		<div class="wide column" id="principal">
			<div class="ui inverted menu" id="menu-topo">
					<div class="title item">{{{ isset($pagina)? $pagina : ucfirst(Request::segment(2)) }}}</div>
					<div class="right menu">
					<a href="#" class="item"><i class="search icon large" style="position:relative;left:-0.2em"></i></a>
					<a href="{{ URL::to('user/logout') }}" class="item"><i class="off icon large"></i></a>
				</div>
			</div>
			<div class="content">
				@yield('content')
			</div>
		</div>
</body>
</html>