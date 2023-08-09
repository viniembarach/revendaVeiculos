@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content')
    @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    <div class="card-header" style="background: lightgrey">
        <h3>Nova Venda</h3>
    </div>

    <div class="card-body">
        {!! Form::open(['route' => 'vendas.store'])  !!}
            <div class="form-group">
                {!! Form::label('data', 'Data da venda:') !!}
                {!! Form::date('data', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('pessoa_id', 'Comprador:') !!}
                {!! Form::select("pessoa_id", \App\Pessoa::where('tipo', 'cliente')->orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um comprador"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vendedor_id', 'Vendedor:') !!}
                {!! Form::select("vendedor_id", \App\Pessoa::where('tipo', 'vendedor')->orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Vendedor"]) !!}
            </div>

            <hr>
            <h4>Veiculos</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float: right" class="add_field_button btn btn-default">
                Adicionar Veiculo
            </button>
            <br>
            <hr>

            <div class="form-group">
                {!! Form::submit('Criar Venda', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;

            var myarray = [];
            var previousValue = 0;
            var previousIndex = 0;

            $(add_button).click(function(e) {
                x++;
                //var newField = '<div><div style="width:94%; float:left" id="veiculo">{!! Form::select("veiculos[]", \App\Veiculos::orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Veiculo"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';

                var newField = '<div><div style="width:94%; float:left" id="veiculo">{!! Form::select("veiculos[]", \App\Veiculos::selectRaw("veiculos.id, CONCAT(veiculos.nome, ' - ', veiculos.modelo, ' - ', veiculos.ano_fabri, ' (', fabricantes.nome, ')') AS completo")->join('fabricantes', 'veiculos.fabricante_id', '=', 'fabricantes.id')->pluck("completo", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Veiculo"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';


                //var newField = '<div><div style="width:94%; float:left" id="veiculo">{!! Form::select("veiculos[]", \App\Veiculos::raw("CONCAT(\App\Veiculos::nome, ' - ', \App\Veiculos::modelo, ' - ', \App\Veiculos::ano_fabri, ' (', \App\Veiculos::fabricante_id, ')') AS completo")->get()->pluck("completo", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Veiculo"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';
                // SELECT CONCAT(`nome`, ' - ', `modelo`, ' - ', `ano_fabri`, ' (', `fabricante_id`, ')') AS completo FROM veiculos;

                $(wrapper).append(newField);
            });

            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();

                selectedValue = $(this).parent('div').find(":selected").val();
                var myIndex = myarray.indexOf(selectedValue);
                if (myIndex !== -1)
                    myarray.splice(myIndex, 1);

                $(this).parent('div').remove();
                x--;
            });

            $(wrapper).on("focus", "select", function(e) {
                e.preventDefault();
                previousValue = $(this).find(":selected").val();
                previousIndex = $(this).find(":selected").index();
            });

            $(wrapper).on("change", "select", function(e) {
                e.preventDefault();
                selectedValue = $(this).find(":selected").val();
                if(myarray.find(element => element == selectedValue)) {
                    Swal.fire('Veiculo já se encontra na lista de veiculos da venda!',
                    'Por favor, selecione outro veiculo.',
                    'warning');
                    $(this).prop('selectedIndex', previousIndex);
                }
                else {
                    if(myarray.length < x && previousValue == "") {
                        myarray.push(selectedValue);
                    }
                    else {
                        var index = myarray.indexOf(previousValue);
                        if(index !== -1) {
                            myarray[index] = selectedValue;
                            previousValue = selectedValue;
                        }
                    }
                }
                /* Exemplo para imprimir log e inspecionar funcionamento
                do código no browser */
                //for (i = 0; i < myarray.length; i++)
                //    console.log((i+1) + ": " + myarray[i]);
                //console.log("---");
            });

        });
    </script>
@stop
