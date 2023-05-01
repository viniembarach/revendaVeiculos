@extends('layouts.default')

@section('content')
    <h1>Pessoas</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->tipo }}</td>
                    <td>
                        <a href="{{ route('pessoas.edit', ['id'=>$pessoa->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$pessoa->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pessoas->links() }}

    <a href="{{ route('pessoas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"pessoas"
@endsection
