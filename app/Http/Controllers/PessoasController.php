<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Http\Requests\PessoaRequest;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class PessoasController extends Controller
{
    public function index(){
        $pessoas = Pessoa::orderBy('nome')->paginate(5);
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

    public function destroy($id){
        Pessoa::find($id)-> delete();
        return redirect()->route('pessoas');
    }

    public function edit($id){
        $pessoa = Pessoa::find($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(PessoaRequest $request, $id){
        Pessoa::find($id)->update($request->all());
        return redirect()->route('pessoas');
    }

}
