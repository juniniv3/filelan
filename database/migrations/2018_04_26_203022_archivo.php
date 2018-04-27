<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archivo extends Migration
{
    /**
     * Run the migrations.
     *  'tipo',
        'extension',
        'ruta',
        'fechaSubida',
        'ultimaModificacion',
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('extension');
            $table->string('descripcion',1000);
            $table->dateTime('fechaSubida');
            $table->dateTime('ultimaModificacion');
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
        Schema::dropIfExists('archivos');
    }
}
