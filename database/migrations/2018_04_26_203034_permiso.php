<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permiso extends Migration
{
    /**
     * Run the migrations.
     *'nombre',
        'nivel',
        'usuario_id',
        'archivo_id'
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nivel');
            $table->integer('usuario_id')->unsigned();
            $table->integer('archivo_id')->unsigned();
            $table->timestamps();
       
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('archivo_id')->references('id')->on('archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
