<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Tipo_veiculo;
	use App\Http\Requests\Tipo_veiculoRequest;
	use Illuminate\Support\Facades\Redirect;

class Tipo_veiculosController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $tipo_veiculos = Tipo_veiculo::orderBy('classe')->paginate(10);
        else
            $tipo_veiculos = Tipo_veiculo::where('classe', 'like', '%'.$filtragem.'%')
                            ->orderBy("classe")
                            ->paginate(10)
                            ->setpath('tipo_veiculos?desc_filtro='.$filtragem);

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

    public function destroy(Request $request){
        try{
            Tipo_veiculo::find(\Crypt::decrypt($request->get('id')))->delete();
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
        $tipo_veiculo = Tipo_veiculo::find(\Crypt::decrypt($request->get('id')));
        return view('tipo_veiculos.edit', compact('tipo_veiculo'));
    }

    public function update(Tipo_veiculoRequest $request, $id){
        Tipo_veiculo::find($id)->update($request->all());
        return redirect()->route('tipo_veiculos');
    }
}
