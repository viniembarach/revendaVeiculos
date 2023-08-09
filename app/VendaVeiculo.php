<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaVeiculo extends Model
{
    protected $table = "venda_veiculos";
    protected $fillable = ['venda_id', 'veiculo_id'];

    
}
