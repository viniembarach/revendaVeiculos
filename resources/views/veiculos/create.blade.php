@extends('adminlte::page')

@section('js')
    <!-- não precisa incluir a lib jquery, pois o laravel já add ela -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".moeda").maskMoney({
                prefix: "R$ ",
                decimal: ",",
                thousands: "."
            });
        });
    </script>
@stop

@section('content')
    <h3>Novo Veiculo</h3>

    {{-- Informar que os erros ocoreram--}}
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => 'veiculos.store']) !!}
        {{-- Pegar o Nome --}}
        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ano_fabri', 'Ano de Fabricação:') !!}
            {!! Form::number('ano_fabri', null, ['class' => 'form-control', 'required', 'oninput' => 'if(this.value.length > 4) this.value = this.value.slice(0, 4); validity.valid||(value="");']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('modelo', 'Modelo de Veiculo:') !!}
            {!! Form::text('modelo', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('preco', 'Preço:') !!}
            {!! Form::text('preco', null, ['class' => 'form-control moeda', 'required', 'maxlength' => '17']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fabricante_id', 'Fabricante:') !!}
            {!! Form::select('fabricante_id', \App\Fabricante::orderBy('nome')->pluck('nome', 'id')->toArray(),
                                                null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tipo_veiculo_id', 'Tipo do Veiculo:') !!}
            {!! Form::select('tipo_veiculo_id', \App\tipo_veiculo::orderBy('classe')->pluck('classe', 'id')->toArray(),
                                                null, ['class'=>'form-control', 'required']) !!}
        </div>



        <div class="form-group">
            {!! Form::submit('Criar Veiculo', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>



    {!! Form::close() !!}
@stop
