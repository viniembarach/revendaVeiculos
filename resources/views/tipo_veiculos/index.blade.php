@extends('layouts.default')

@section('content')
    <h1>Tipo de Veiculos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'tipo_veiculos']) !!}
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
            <th>Classe</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($tipo_veiculos as $tipo_veiculo)
                <tr>
                    <td>{{ $tipo_veiculo->classe }}</td>
                    <td>
                        <a href="{{route('tipo_veiculos.edit', ['id'=>\Crypt::encrypt($tipo_veiculo->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($tipo_veiculo->id)}}')" class="btn-sm btn-danger">Remover</a>
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
