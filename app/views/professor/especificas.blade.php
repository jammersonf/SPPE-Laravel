{{ Form::open(array('url' => 'ensino/cadconteudo','class'=>'signin ui form')) }}
    {{ Form::text('conteudo',null,array('placeholder'=>'Conteúdo')) }}
    {{ Form::textarea('conhecimento',null,array('placeholder'=>'Conhecimento')) }}
    {{ Form::textarea('fazer',null,array('placeholder'=>'Saber fazer')) }}
    {{ Form::textarea('ser',null,array('placeholder'=>'Saber Ser')) }}
    {{ Form::textarea('agir',null,array('placeholder'=>'SaSaber agir')) }}
    {{ Form::textarea('estrategias',null,array('placeholder'=>'Estratégias de Ensino/Aprendizagem')) }}
    {{ Form::textarea('num',null,array('placeholder'=>'Nº de Aulas')) }}
    {{ Form::textarea('semana',null,array('placeholder'=>'Semana/Data')) }}
    {{ Form::hidden('ensino', Request::segment(3)) }}
    <button class="fluid positive ui small button" style="margin-top:0.5em"><i class="checkmark icon"></i></button>
{{ Form::close() }}