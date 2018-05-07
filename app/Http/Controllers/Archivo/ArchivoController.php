<?php

namespace App\Http\Controllers\Archivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Archivo;
use App\Permiso;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $campos = $request->all();

      $permisos = Permiso::where('usuarios_id','=',$campos['idUsuario'])->get();
      $archivos = [];

      //array_push($archivos,"xd");
    //  return $archivos;
      foreach ($permisos as &$valor) {

          $archivo = Archivo::find($valor->Archivos_id);

          array_push($archivos,$archivo);
          }

      return $archivos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
$archivo  =  $campos['file'];



if($request->hasFile('file')){

  //return $request->file('file')->extension();
  $ruta = "public/usuarios/".$campos['idUsuario'];
//return $campos['tipo'];
  $nuevoArchivo = new Archivo;
  $nuevoArchivo->tipo = "archivo";
  $nuevoArchivo->extension = '';
  $nuevoArchivo->ruta =$ruta;
  $nuevoArchivo->fechaSubida = date('Y-m-d H:i:s');
  $nuevoArchivo->ultimaModificacion = date('Y-m-d H:i:s');
  $nuevoArchivo->nombre = $request->file('file')->getClientOriginalName();

  //creamos el archivo en la base de datos
  $nuevoArchivo->save();

  //creamos el archivo en el repositorio


  Storage::putFileAs($ruta,$request->file('file'),"archivo".$nuevoArchivo->id.".".$request->file('file')->extension());
  $ruta = $ruta."/archivo".$nuevoArchivo->id;
  $nuevoArchivo->ruta = $ruta.".".$request->file('file')->extension();
  $nuevoArchivo->extension = ".".$request->file('file')->extension();
  $nuevoArchivo->save();

  //creamos la relacion con el usuario que subió el archivo

  $nuevoPermiso = new Permiso;
  $nuevoPermiso->nombre ="permiso de dueño";
  $nuevoPermiso->nivel = 1;
  $nuevoPermiso->usuarios_id = $campos['idUsuario'];
  $nuevoPermiso->archivos_id = $nuevoArchivo->id;

  $nuevoPermiso->save();

  return "archivo recibido";

}else{
    return "archivoNoEnviado";
}



    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //buscamos el archivo en la base de datos
            $archivo = Archivo::find($id);
          //  return $archivo->nombre;
            $rutaDescarga = $archivo->ruta;
            $nombreArchivo = $archivo->nombre;

            if (file_exists($rutaDescarga)) {
              //  return Response::download($path);
                error_log("entro");
                //$visibility = Storage::getVisibility('public/usuarios/1/archivo11.docx');
                error_log(public_path());

                        }

      // return response()->download("storage/usuarios/1/archivo11.docx","archivo11.docx","inline" );
        return Storage::download($rutaDescarga, Str::ascii($nombreArchivo));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
          $archivo = Archivo::find($id);

          if ($archivo != null) {


              $permisos = DB::table('permisos')->where('archivos_id',$id)->delete();
              Storage::delete($archivo->ruta);
              $archivo->delete();

              return response('archivo eliminado con exito', 200)
                                ->header('Content-Type', 'text/plain');
          }else{

            return response('archivo no eliminado con exito', 200)
                              ->header('Content-Type', 'text/plain');
          }
    }
}
