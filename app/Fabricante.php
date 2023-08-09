<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = "fabricantes";
    protected $fillable = ['nome'];

    public function veiculos(){
        return $this->hasMany(Veiculos::class);
    }
}
