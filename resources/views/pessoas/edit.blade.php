@extends('adminlte::page')

@section('content')
    <h3>Editando Pessoa: {{ $pessoa->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>"pessoas/$pessoa->id/update", 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('cpf', 'CPF:') !!}
            {!! Form::number('cpf', $pessoa->cpf, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $pessoa->nome, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::number('telefone', $pessoa->telefone, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('endereco', 'Endereço:') !!}
            {!! Form::text('endereco', $pessoa->endereco, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tipo', 'Tipo:') !!}
            {!! Form::select('tipo', array( 'Vendedor'=>'Vendedor',
                                            'Cliente'=>'Cliente'), $pessoa->tipo, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Pessoa', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}
@stop
