<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $table = "veiculos";
    protected $fillable = ['nome', 'ano_fabri', 'modelo', 'preco', 'fabricante_id', 'tipo_veiculo_id'];
    

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'fabricante_id');
    }

    public function tipo_veiculo()
    {
        return $this->belongsTo(Tipo_veiculo::class, 'tipo_veiculo_id');
    }
}

