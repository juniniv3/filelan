<?php

namespace App\Http\Controllers\Permiso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Permiso;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $campos = $request->all();
      //buscamos el usuario por correo
      $permiso = new Permiso();
      $permiso->nombre = $campos['nombre'];
      $permiso->nivel = $campos['nivel'];
      $permiso->usuarios_id = $campos['idUsuario'];
      $permiso->archivos_id = $campos['idArchivo'];

      $archivo = Archivo::find($idArchivo);

      if($archivo!=null){


        try
          {
            $permiso->save();
          }
          catch (Throwable $t)
          {
            return response('no se pudo agregar el permiso, revisa la información enviada', 404)
                ->header('Content-Type', 'text/plain');
          }

        return response('permiso agregado con éxito', 201)
            ->header('Content-Type', 'text/plain');

      }else{
        return response('No se pudo asociar el archivo con el usuario', 404)
            ->header('Content-Type', 'text/plain');
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
