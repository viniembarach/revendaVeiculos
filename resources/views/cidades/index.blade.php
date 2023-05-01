@extends('layouts.default')

@section('content')
    <h1>Cidades</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>UF</th>
            <th>Nome</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->uf }}</td>
                    <td>{{ $cidade->nome }}</td>
                    <td>
                        <a href="{{ route('cidades.edit', ['id'=>$cidade->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$cidade->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cidades->links() }}

    <a href="{{ route('cidades.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"cidades"
@endsection
