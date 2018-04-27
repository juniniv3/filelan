<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $fillable =[
        'fecha',
        'usuario_id'
    ];

    protected function usuario(){
        return $this->belongsTo(Usuario::class);
    }


}
