<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Tipo_veiculo;
	use App\Http\Requests\Tipo_veiculoRequest;
	use Illuminate\Support\Facades\Redirect;

class Tipo_veiculosController extends Controller
{
    public function index(){
        $tipo_veiculos = Tipo_veiculo::orderBy('classe')->paginate(5);
        return view('tipo_veiculos.index', ['tipo_veiculos'=>$tipo_veiculos]);
    }

    public function create(){
        return view('tipo_veiculos.create');
    }

    public function store(Tipo_veiculoRequest $request) {
        $nova_tipo_veiculo = $request->all();
        Tipo_veiculo::Create($nova_tipo_veiculo);

        return redirect()->route('tipo_veiculos');
    }

    public function destroy($id){
        Tipo_veiculo::find($id)-> delete();
        return redirect()->route('tipo_veiculos');
    }

    public function edit($id){
        $tipo_veiculo = Tipo_veiculo::find($id);
        return view('tipo_veiculos.edit', compact('tipo_veiculo'));
    }

    public function update(Tipo_veiculoRequest $request, $id){
        Tipo_veiculo::find($id)->update($request->all());
        return redirect()->route('tipo_veiculos');
    }
}
