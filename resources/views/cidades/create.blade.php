@extends('adminlte::page')

@section('content')
    <h3>Nova Cidade</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'cidades/store']) !!}
        <div class="form-group">
            {!! Form::label('uf', 'Estado:') !!}
            {!! Form::select('uf', array( 'AC'=>'Acre',
                                          'AL'=>'Alagoas',
                                          'AP'=>'Amapá',
                                          'AM'=>'Amazonas',
                                          'BA'=>'Bahia',
                                          'CE'=>'Ceará',
                                          'DF'=>'Distrito Federal',
                                          'ES'=>'Espírito Santo',
                                          'GO'=>'Goiás',
                                          'MA'=>'Maranhão',
                                          'MT'=>'Mato Grosso',
                                          'MS'=>'Mato Grosso do Sul',
                                          'MG'=>'Minas Gerais',
                                          'PA'=>'Pará',
                                          'PB'=>'Paraíba',
                                          'PR'=>'Paraná',
                                          'PE'=>'Pernambuco',
                                          'PI'=>'Piauí',
                                          'RJ'=>'Rio de Janeiro',
                                          'RN'=>'Rio Grande do Norte',
                                          'RS'=>'Rio Grande do Sul',
                                          'RO'=>'Rondônia',
                                          'RR'=>'Roraima',
                                          'SC'=>'Santa Catarina',
                                          'SP'=>'São Paulo',
                                          'SE'=>'Sergipe',
                                          'TO'=>'Tocantins'), null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Cidade', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}
@stop
