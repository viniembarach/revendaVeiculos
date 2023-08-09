@extends('adminlte::page')

@section('js')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00');
            $('form').submit(function() {
                var cpf = $('.cpf').val();
                cpf = cpf.replace(/\./g, '').replace(/\-/g, ''); // Remove pontos e traços do CPF
                $('.cpf').val(cpf); // Define o valor formatado sem pontos e traços no campo CPF
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.sp_celphones').mask('(00) 0 0000-0000');
            $('form').submit(function() {
                var telefone = $('.sp_celphones').val();
                telefone = telefone.replace(/\(/g, '').replace(/\)/g, '').replace(/\ /g, '').replace(/\./g, '').replace(/\-/g, ''); // Remove pontos e traços do CPF
                $('.sp_celphones').val(telefone); // Define o valor formatado sem pontos e traços no campo CPF
            });
        });
    </script>

@stop

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
            {!! Form::text('cpf', $pessoa->cpf, ['class' => 'form-control cpf', 'required', 'maxlength' => '14', 'oninput' => 'if(this.value.length > 14) this.value = this.value.slice(0, 14); validity.valid||(value="");']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nome', 'Nome:') !!}
            {!! Form::text('nome', $pessoa->nome, ['class' => 'form-control', 'required', 'maxlength' => '100', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZçÇãâáàéêíóôõúü\s]/g, '')"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::text('telefone', $pessoa->telefone, ['class' => 'form-control sp_celphones', 'required', 'oninput' => 'if(this.value.length > 16) this.value = this.value.slice(0, 16); validity.valid||(value="");']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('endereco', 'Endereço:') !!}
            {!! Form::text('endereco', $pessoa->endereco, ['class' => 'form-control', 'required', 'maxlength' => '500']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cidade_id', 'Cidade:') !!}
            {!! Form::select('cidade_id', \App\Cidade::orderBy('nome')->pluck('nome', 'id')->toArray(),
                                                $pessoa->cidade_id, ['class'=>'form-control', 'required']) !!}
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
