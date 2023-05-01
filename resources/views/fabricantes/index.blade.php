@extends('layouts.default')

@section('content')
    <h1>Fabricantes</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($fabricantes as $fabricante)
                <tr>
                    <td>{{ $fabricante->nome }}</td>
                    <td>
                        <a href="{{ route('fabricantes.edit', ['id'=>$fabricante->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$fabricante->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $fabricantes->links() }}

    <a href="{{ route('fabricantes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"fabricantes"
@endsection
