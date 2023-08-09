<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = "cidades";
    protected $fillable = ['uf', 'nome'];

    public function pessoa(){
        return $this->hasMany(Pessoa::class);
    }
}
