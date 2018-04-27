<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restriccion extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     *   'rol_id',
        'usuario_id'
     * 
     * 
     * @return void
     */
    public function up()
    {

        Schema::create('restriccions', function (Blueprint $table) {
          
            $table->integer('usuario_id')->unsigned();
            $table->integer('rol_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('rol_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restricciones');
    }
}
