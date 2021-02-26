<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->id('cliente_id');
            $table->unsignedBigInteger('cliente_creador_id');
            $table->unsignedBigInteger('cliente_pxp_id');
            $table->unsignedBigInteger('cliente_correo_id');
            $table->string('cliente_nombre');
            $table->string('cliente_telefono');
            $table->timestamps();


            $table->foreign('cliente_creador_id')->references('id')->on('users');
            $table->foreign('cliente_pxp_id')->references('pxp_id')->on('tb_pxp');
            $table->foreign('cliente_correo_id')->references('correo_id')->on('tb_correo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cliente');
    }
}
