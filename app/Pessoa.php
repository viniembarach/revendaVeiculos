<?php

namespace App;
use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";
    protected $fillable = ['cpf', 'nome', 'telefone', 'endereco', 'cidade_id', 'tipo'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }


}
