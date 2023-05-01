<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_veiculo extends Model
{
    protected $table = "tipo_veiculos";
    protected $fillable = ['classe'];
}
