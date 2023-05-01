<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fabricante;
use App\Http\Requests\FabricanteRequest;
use Illuminate\Support\Facades\Redirect;

class FabricantesController extends Controller
{
    public function index(){
        $fabricantes = Fabricante::orderBy('nome')->paginate(5);
        return view('fabricantes.index', ['fabricantes'=>$fabricantes]);
    }

    public function create(){
        return view('fabricantes.create');
    }

    public function store(FabricanteRequest $request) {
        $nova_fabricante = $request->all();
        Fabricante::Create($nova_fabricante);

        return redirect()->route('fabricantes');
    }

    public function destroy($id){
        Fabricante::find($id)-> delete();
        return redirect()->route('fabricantes');
    }

    public function edit($id){
        $fabricante = Fabricante::find($id);
        return view('fabricantes.edit', compact('fabricante'));
    }

    public function update(FabricanteRequest $request, $id){
        Fabricante::find($id)->update($request->all());
        return redirect()->route('fabricantes');
    }
}
