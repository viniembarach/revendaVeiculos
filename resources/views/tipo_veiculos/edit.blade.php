@extends('adminlte::page')

@section('content')
    <h3>Editando o Tipo de Veiculo: {{ $tipo_veiculo->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>"tipo_veiculos/$tipo_veiculo->id/update", 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('classe', 'Tipo:') !!}
            {!! Form::text('classe', $tipo_veiculo->classe, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Tipo do Veiculo', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}
@stop
