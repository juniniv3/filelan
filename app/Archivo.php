<?php

namespace App;

use App\Permiso;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable =[
        'tipo',
        'extension',
        'ruta',
        'fechaSubida',
        'ultimaModificacion',
    ];

    public function permisos(){
        return $this->hasMany(Permiso::class);
    }


}
