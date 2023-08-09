<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Http\Requests\PessoaRequest;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class PessoasController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $pessoas = Pessoa::orderBy('nome')->paginate(10);
        else
            $pessoas = Pessoa::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy("nome")
                            ->paginate(10)
                            ->setpath('pessoas?desc_filtro='.$filtragem);

        return view('pessoas.index', ['pessoas'=>$pessoas]);
    }

    public function create(){
        return view('pessoas.create');
    }

    public function store(PessoaRequest $request) {
        $nova_pessoa = $request->all();
        Pessoa::Create($nova_pessoa);

        return redirect()->route('pessoas');
    }

    public function destroy(Request $request) {
        try {
            Pessoa::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $pessoa = Pessoa::find(\Crypt::decrypt($request->get('id')));
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(PessoaRequest $request, $id) {
        Pessoa::find($id)->update($request->all());
        return redirect()->route('pessoas');
    }

}
