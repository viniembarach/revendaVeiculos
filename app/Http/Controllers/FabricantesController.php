<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fabricante;
use App\Http\Requests\FabricanteRequest;
use Illuminate\Support\Facades\Redirect;

class FabricantesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $fabricantes = Fabricante::orderBy('nome')->paginate(10);
        else
            $fabricantes = Fabricante::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy("nome")
                            ->paginate(10)
                            ->setpath('fabricantes?desc_filtro='.$filtragem);

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

    public function destroy(Request $request){
        try{
            Fabricante::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch (\PDOException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $fabricante = Fabricante::find(\Crypt::decrypt($request->get('id')));
        return view('fabricantes.edit', compact('fabricante'));
    }

    public function update(FabricanteRequest $request, $id){
        Fabricante::find($id)->update($request->all());
        return redirect()->route('fabricantes');
    }
}
