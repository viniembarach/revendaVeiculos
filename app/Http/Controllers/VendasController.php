<?php

namespace App\Http\Controllers;

use App\VendaVeiculo;
use App\Venda;
use App\Http\Requests\VendaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{

    public function index()
{
    $vendas = Venda::with('comprador', 'vendedor', 'veiculos')->get();
    return view('vendas.index', compact('vendas'));
}

    public function create(){
        return view('vendas.create');
    }

    public function store(Request $request) { // Aqui também será VendaRequest

        $veiculos = $request->get('veiculos');
        if (!empty($veiculos)) {
            $venda = Venda::create([
                'nome' => $request->get('nome'),
                'data' => $request->get('data'),
                'pessoa_id' => $request->get('pessoa_id'),
                'vendedor_id' => $request->get('vendedor_id')
            ]);

            $veiculos = array_unique($veiculos);
            foreach ($veiculos as $a => $value) {
                VendaVeiculo::create([
                    'venda_id' => $venda->id,
                    'veiculo_id'=> $veiculos[$a]
                ]);
            }
            return redirect()->route('vendas');
        }
        else {
            return redirect()->back()->withInput()->with('message', 'Não é possível salvar uma venda sem adicionar, pelo menos, UM Veiculo!');
        }
    }

    public function edit(Request $request) {
        $venda = Venda::find(\Crypt::decrypt($request->get('id')));
        return view('vendas.edit', compact('venda'));
    }

    public function update(VendaRequest $request, $id){
        $venda = Venda::findOrFail($id);
        $venda->update($request->except('veiculos'));

        $veiculos = $request->input('veiculos', []); // Veículos selecionados
        $venda->veiculos()->sync($veiculos); // Sincroniza os veículos relacionados à venda

        return redirect()->route('vendas');
    }


    public function destroy(Request $request) {
        try {
            $venda = Venda::findOrFail(\Crypt::decrypt($request->get('id')));

            DB::beginTransaction();  // Corrigir a forma de exclusão no banco daqui nas próximas 2 linhas

            // Excluir os registros relacionados na tabela venda_veiculos
            $venda->vendaVeiculos()->delete();

            // Excluir a venda em si
            $venda->delete();

            DB::commit();

            $ret = array('status' => 200, 'msg' => "Venda excluída com sucesso");
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            DB::rollback();
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
