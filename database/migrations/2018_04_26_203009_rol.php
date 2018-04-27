<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rol extends Migration
{
    /**'nombre',
        'tipo',
        'descripcion'
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('descripcion');
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
        Schema::dropIfExists('roles');
    }
}
