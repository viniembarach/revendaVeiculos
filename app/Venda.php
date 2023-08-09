<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pessoa;
use App\Veiculos;

class Venda extends Model
{
    protected $table = "vendas";
    protected $fillable = ['data', 'pessoa_id', 'vendedor_id'];

    public function comprador()
    {
    return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function vendedor()
    {
    return $this->belongsTo(Pessoa::class, 'vendedor_id');
    }

    public function veiculos()
    {
    return $this->belongsToMany(Veiculos::class, 'venda_veiculos', 'venda_id', 'veiculo_id');
    }

    public function vendaVeiculos(){
        return $this->hasMany(VendaVeiculo::class, 'venda_id');
    }



}
