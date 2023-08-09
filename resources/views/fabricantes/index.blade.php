@extends('layouts.default')

@section('content')
    <h1>Fabricantes</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'fabricantes']) !!}
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
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($fabricantes as $fabricante)
                <tr>
                    <td>{{ $fabricante->nome }}</td>
                    <td>
                        <a href="{{route('fabricantes.edit', ['id'=>\Crypt::encrypt($fabricante->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($fabricante->id)}}')" class="btn-sm btn-danger">Remover</a>
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
