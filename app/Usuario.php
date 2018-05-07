<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sesion;


class Usuario extends Model
{
    protected $fillable=[
        'nombre',
        'correo',
        'cuenta',
        'contrasena',
        'fechaRegistro',
    ];


    protected $hidden =[
      'contrasena',
      
    ];

    public $timestamps = false;


    public static function generarCodigoVerificacion(){
        return str_random(40);
    }

    //relacion 1 a muchos con la tabla sesion
    public function sesiones(){
        return $this->hasMany(Sesion::class);
    }

    //relación 1 a muchos con la tabla restriccion
    public function restricciones(){
        return $this->hasMany(Restriccion::class);
    }

    //Relación 1 a muchos con la tabla permiso
    public function permisos(){
        return $this->hasMany(Permiso::class);
    }


}
