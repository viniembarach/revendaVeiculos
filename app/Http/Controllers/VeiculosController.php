<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculos;
use App\Fabricante;
use App\Http\Requests\VeiculoRequest;

class VeiculosController extends Controller
{
    public function index(Request $filtro)
{
    $filtragem = $filtro->get('desc_filtro');

    if ($filtragem == null) {
        $veiculos = Veiculos::with('fabricante', 'tipo_veiculo')
            ->join('fabricantes', 'veiculos.fabricante_id', '=', 'fabricantes.id')
            ->select('veiculos.*', 'fabricantes.nome as fabricante_nome')
            ->orderBy('veiculos.nome')
            ->paginate(10);
    } else {
        $veiculos = Veiculos::with('fabricante', 'tipo_veiculo')
            ->join('fabricantes', 'veiculos.fabricante_id', '=', 'fabricantes.id')
            ->select('veiculos.*', 'fabricantes.nome as fabricante_nome')
            ->where('veiculos.nome', 'like', '%'.$filtragem.'%')
            ->orderBy('veiculos.nome')
            ->paginate(10)
            ->appends(['desc_filtro' => $filtragem]);
    }

    return view('veiculos.index', ['veiculos' => $veiculos, 'filtragem' => $filtragem]);
}

    // public function index(Request $filtro){
    //     $filtragem = $filtro->get('desc_filtro');
    //     if ($filtragem == null)
    //         $veiculos = \DB::table('veiculos')
    //             ->join('fabricantes', 'veiculos.fabricante_id', '=', 'fabricantes.id')
    //             ->select('veiculos.*', 'fabricantes.nome')
    //             ->paginate(10);
    //     else
    //         $veiculos = Veiculos::where('nome', 'like', '%'.$filtragem.'%')
    //                         ->orderBy("nome")
    //                         ->paginate(10)
    //                         ->setpath('veiculos?desc_filtro='.$filtragem);

    //     return view ('veiculos.index', ['veiculos'=>$veiculos]);
    // }



    public function create() {
        return view('veiculos.create');
    }

    public function store(Request $request)
{
    // Validar os dados do formulário
    $request->validate([
        'nome' => 'required',
        'ano_fabri' => 'required',
        'modelo' => 'required',
        'preco' => 'required',
        'fabricante_id' => 'required',
        'tipo_veiculo_id' => 'required',
    ]);

    // Remover símbolos de moeda, separadores de milhar e trocar a vírgula decimal por ponto
    $preco = str_replace(['R$', '.', ','], ['', '', '.'], $request->input('preco'));

    // Converter para número decimal
    $precoDecimal = (float) $preco;

    // Criar um novo veículo
    $veiculo = new Veiculos();
    $veiculo->nome = $request->input('nome');
    $veiculo->ano_fabri = $request->input('ano_fabri');
    $veiculo->modelo = $request->input('modelo');
    $veiculo->preco = $precoDecimal;
    $veiculo->fabricante_id = $request->input('fabricante_id');
    $veiculo->tipo_veiculo_id = $request->input('tipo_veiculo_id');
    $veiculo->save();

    return redirect()->route('veiculos')->with('success', 'Veículo criado com sucesso.');
}

    public function destroy(Request $request) {
        try {
            Veiculos::find(\Crypt::decrypt($request->get('id')))->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $veiculo = Veiculos::find(\Crypt::decrypt($request->get('id')));
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, $id){
        // Validar os dados do formulário
        $request->validate([
            'nome' => 'required',
            'ano_fabri' => 'required',
            'modelo' => 'required',
            'preco' => 'required',
            'fabricante_id' => 'required',
            'tipo_veiculo_id' => 'required',
        ]);

        // Remover símbolos de moeda, separadores de milhar e trocar a vírgula decimal por ponto
        $preco = str_replace(['R$', '.', ','], ['', '', '.'], $request->input('preco'));

        // Converter para número decimal
        $precoDecimal = (float) $preco;

        // Encontrar o veículo existente pelo ID
        $veiculo = Veiculos::findOrFail($id);

        // Atualizar os dados do veículo
        $veiculo->nome = $request->input('nome');
        $veiculo->ano_fabri = $request->input('ano_fabri');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->preco = $precoDecimal;
        $veiculo->fabricante_id = $request->input('fabricante_id');
        $veiculo->tipo_veiculo_id = $request->input('tipo_veiculo_id');
        $veiculo->save();

        return redirect()->route('veiculos')->with('success', 'Veículo atualizado com sucesso.');
    }


}
