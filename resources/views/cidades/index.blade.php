@extends('layouts.default')

@section('content')
    <h1>Cidades</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'cidades']) !!}
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
                        <a href="{{route('cidades.edit', ['id'=>\Crypt::encrypt($cidade->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{\Crypt::encrypt($cidade->id)}}')" class="btn-sm btn-danger">Remover</a>
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
