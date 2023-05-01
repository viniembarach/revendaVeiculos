<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Http\Requests\CidadeRequest;
use Illuminate\Support\Facades\Redirect;

class CidadesController extends Controller
{
    public function index(){
        $cidades = Cidade::orderBy('nome')->paginate(5);
        return view('cidades.index', ['cidades'=>$cidades]);
    }

    public function create(){
        return view('cidades.create');
    }

    public function store(CidadeRequest $request) {
        $nova_cidade = $request->all();
        Cidade::Create($nova_cidade);

        return redirect()->route('cidades');
    }

    public function destroy($id){
        Cidade::find($id)-> delete();
        return redirect()->route('cidades');
    }

    public function edit($id){
        $cidade = Cidade::find($id);
        return view('cidades.edit', compact('cidade'));
    }

    public function update(CidadeRequest $request, $id){
        Cidade::find($id)->update($request->all());
        return redirect()->route('cidades');
    }
}
