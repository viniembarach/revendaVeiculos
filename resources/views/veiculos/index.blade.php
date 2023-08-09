@extends('layouts.default')

@section('content')

<h1>Veiculos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'veiculos']) !!}
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
            <th>Nome</th>
            <th>Modelo</th>
            <th>Fabricante</th>
            <th>Ano de Fabricação</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
            <tr>
                <td>{{ $veiculo->nome}}</td>
                <td>{{ $veiculo->modelo }}</td>
                <td>{{ $veiculo->fabricante_nome }}</td>
                <td>{{ $veiculo->ano_fabri }}</td>
                <td>R$ {{ number_format($veiculo->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{route('veiculos.edit', ['id'=>\Crypt::encrypt($veiculo->id)]) }}" class="btn-sm btn-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($veiculo->id)}}')" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $veiculos->links() }}

    <a href="{{route('veiculos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"veiculos"
@endsection
