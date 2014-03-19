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
    {{ Form::open(array('url' => 'cadastro/cadturma','class'=>'signin ui form')) }}
        <select name="curso" id="curso">
        <option selected="selected">Curso</option>
            @foreach ($curso as $c)
                <option value="{{ $c->id }}">{{ $c->nome_curso }}</option>
            @endforeach
        </select>

        <select name="base" id="base">
            <option value="">Base</option>
        </select>

        <select name="professor" id="professor">
            <option selected="selected">Professor</option>
            @foreach ($user as $u)
            <option value="{{ $u->id }}">{{ $u->username }}</option>
            @endforeach
        </select>

        {{ Form::text('periodo',null,array('placeholder'=>'Período')) }}
        {{ Form::select('turno',array('manha'=>'Manhã', 'tarde'=>'Tarde', 'Noite' =>'Noite')) }}

<button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
    {{ Form::close() }}
<script>
    $('#base').hide();
    $("select[name=curso]").change(function(){
        curso = $(this).val();
        if ( curso === '')
            return false;
        $('#base').show("slow");
        resetaCombo('base');
        $.getJSON('buscabase/' + curso, function (data){
            //	console.log(data);
            var option = new Array();
            $.each(data, function(i, obj){
                option[i] = document.createElement('option');
                $( option[i] ).attr( {value : obj.id} );
                $( option[i] ).append( obj.nome_base );
                $("select[name='base']").append( option[i] );
            });
        });
    });

    function resetaCombo( el ) {
        $("select[name='"+el+"']").empty();
        var option = document.createElement('option');
        $( option ).attr( {value : ''} );
        $( option ).append( 'Base' );
        $("select[name='"+el+"']").append( option );
    }
</script>
@stop