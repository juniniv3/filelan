<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    protected $fillable =[
        'nombre',
        'tipo',
        'descripcion'
    ];
    public $timestamps = false;

    public function restricciones(){
        return $this->hasMany(Restriccion::class);
    }


}
