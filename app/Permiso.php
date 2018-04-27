<?php

namespace App;

use App\Permiso;
use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable =[
        'nombre',
        'nivel',
        'usuario_id',
        'archivo_id'
        ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function permiso(){
        return $this->belongsTo(Permiso::class);
    }
}