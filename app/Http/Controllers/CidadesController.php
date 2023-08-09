<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Http\Requests\CidadeRequest;
use Illuminate\Support\Facades\Redirect;

class CidadesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $cidades = Cidade::orderBy('nome')->paginate(10);
        else
            $cidades = Cidade::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy("nome")
                            ->paginate(10)
                            ->setpath('cidades?desc_filtro='.$filtragem);

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

    public function destroy(Request $request){
        try{
            Cidade::find(\Crypt::decrypt($request->get('id')))->delete();
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
        $cidade = Cidade::find(\Crypt::decrypt($request->get('id')));
        return view('cidades.edit', compact('cidade'));
    }

    public function update(CidadeRequest $request, $id){
        Cidade::find($id)->update($request->all());
        return redirect()->route('cidades');
    }
}
