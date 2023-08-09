<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nome', 100);
            $table->String('ano_fabri', 4);
            $table->String('modelo', 100);
            $table->decimal('preco', 10,2);
            $table->bigInteger('fabricante_id')->unsigned()->nullable();
            $table->foreign('fabricante_id')->references('id')->on('fabricantes');
            $table->bigInteger('tipo_veiculo_id')->unsigned()->nullable();
            $table->foreign('tipo_veiculo_id')->references('id')->on('tipo_veiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
