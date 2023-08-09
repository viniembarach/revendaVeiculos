@extends('adminlte::page')

@section('content')
    <h3>Novo Tipo de Veiculo</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url'=>'tipo_veiculos/store']) !!}
        <div class="form-group">
            {!! Form::label('classe', 'Tipo:') !!}
            {!! Form::text('classe', null, ['class' => 'form-control', 'required', 'maxlength' => '50', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZçÇãâáàéêíóôõúü\s]/g, '')"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Tipo de Veiculo', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>


    {!! Form::close() !!}
@stop
