<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposServicosObjetosServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_servicos_objetos_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_servico_id');
            $table->integer('objeto_servico_id');
            $table->foreign('tipo_servico_id')->references('id')->on('tipos_servicos')->onDelete('cascade');
            $table->foreign('objeto_servico_id')->references('id')->on('objetos_servicos')->onDelete('cascade');
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
        Schema::dropIfExists('tipos_servicos_objetos_servicos');
    }
}
