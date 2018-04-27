<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessiones');
    }
}
