<?php

namespace App;

use App\Rol;
use App\Usuario;
use Illuminate\Database\Eloquent\Model;


class Restriccion extends Model
{

   protected $table = 'Restricciones';
    protected $fillable =[
        'rols_id',
        'usuarios_id'
    ];

    //relación one to many tabla Usuario
    protected function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }

    //relación one to many tabla rol
    protected function roles(){
        return $this->belongsToMany(Rol::class);
    }


}
