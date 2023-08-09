@extends('layouts.default')

@section('content')
    <h1>Pessoas</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'pessoas']) !!}
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
            <th>Tipo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->tipo }}</td>
                    <td>
                        <a href="{{ route('pessoas.edit', ['id'=>\Crypt::encrypt($pessoa->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($pessoa->id)}}')" class="btn-sm btn-danger">Remover</a>
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
