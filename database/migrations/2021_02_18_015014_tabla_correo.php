<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaCorreo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_correo', function (Blueprint $table) {
            $table->id('correo_id');
            $table->unsignedBigInteger('correo_creador_id');
            $table->unsignedBigInteger('correo_servicio_id');
            $table->string('correo_correo');
            $table->string('correo_password');
            $table->integer('perfil');
            $table->date('fecha_finaliza');
            $table->timestamps();


            $table->foreign('correo_creador_id')->references('id')->on('users');
            $table->foreign('correo_servicio_id')->references('servicio_id')->on('tb_servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_correo');
    }
}
