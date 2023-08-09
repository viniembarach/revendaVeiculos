@extends('adminlte::page')

@section('content')
    <h3>Editando Fabricante: {{ $fabricante->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>"fabricantes/$fabricante->id/update", 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $fabricante->nome, ['class' => 'form-control', 'required', 'maxlength' => '50', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZçÇãâáàéêíóôõúü\s]/g, '')"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Fabricante', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}
@stop
