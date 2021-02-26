<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaPxp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pxp', function (Blueprint $table) {
            $table->id('pxp_id');
            $table->unsignedBigInteger('pxp_servicio_id');
            $table->integer('pxp_perfil');
            $table->float('pxp_precio',5,2);
            $table->timestamps();

            $table->foreign('pxp_servicio_id')->references('servicio_id')->on('tb_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pxp');
    }
}
