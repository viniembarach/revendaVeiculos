@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Listagem de Vendas</h3>
    </div>

    {!! Form::open(['name'=>'form_name', 'route'=>'vendas']) !!}
        <div class="sidebar-form">
            <div class="input-group">
                <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    {!! Form::close() !!}
    <br>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Venda N°</th>
            <th>Comprador</th>
            <th>Vendedor</th>
            <th>Veiculo(s) comprado(s)</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $venda->comprador->nome }}</td>
                    <td>{{ $venda->vendedor->nome }}</td>
                    <td>
                        <ul>
                            @foreach ($venda->veiculos as $veiculo)
                                <li>{{ $veiculo->nome }} - {{ $veiculo->modelo }} - {{ $veiculo->ano_fabri }} - {{ $veiculo->fabricante->nome }}</li>
                            @endforeach

                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('vendas.edit', ['id' => \Crypt::encrypt($venda->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($venda->id)}}')" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('vendas.create') }}" class="btn btn-info">Adicionar</a>
@stop
@section('table-delete')
"vendas"
@endsection
