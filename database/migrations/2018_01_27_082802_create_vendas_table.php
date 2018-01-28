<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 160)->nullable();
            $table->float('valor');
            $table->integer('tipo_pagamento_id');
            $table->integer('produto_id');
            $table->integer('tipo_servico_id');
            $table->foreign('tipo_pagamento_id')->references('id')->on('tipos_pagamentos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('tipo_servico_id')->references('id')->on('tipos_servicos')->onDelete('cascade');
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
        Schema::dropIfExists('vendas');
    }
}
