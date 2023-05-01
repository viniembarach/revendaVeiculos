@extends('layouts.default')

@section('content')
    <h1>Tipo de Veiculos</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Classe</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($tipo_veiculos as $tipo_veiculo)
                <tr>
                    <td>{{ $tipo_veiculo->classe }}</td>
                    <td>
                        <a href="{{ route('tipo_veiculos.edit', ['id'=>$tipo_veiculo->id]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$tipo_veiculo->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tipo_veiculos->links() }}

    <a href="{{ route('tipo_veiculos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"tipo_veiculos"
@endsection
