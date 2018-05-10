<?php

namespace App\Http\Controllers\Usuario;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller

{
    /**
    $usuarios = Usuario::all();
    return response()->json($usuarios,202);
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request) {

        $campos  = $request->all();

            $usuario = DB::table('usuarios')->where('cuenta',$campos['cuentaUsuario'])->first();

            //return Crypt::decrypt($usuario->contrasena);
            if($usuario!=null){

                if(  Crypt::decrypt($usuario->contrasena) ==$campos['contrasenaUsuario']){

                  return response()->json($usuario);

                }else{

                  return response('Usuario o contraseña incorrecta', 404)
                      ->header('Content-Type', 'text/plain');
                }

            }

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
            $usuarioExistente = DB::table('usuarios')->where('cuenta',$campos['cuenta'])->first();

            if($usuarioExistente!=null){

                return "El usuario ingresado ya se encuentra en uso";

            }else{
        $campos = $request->all();
        $campos['contrasena'] = Crypt::encrypt($request->contrasena);
        //$campos['codigoVerificacion'] = str_random(40);
        $date = date('Y-m-d H:i:s');
        $campos['fechaRegistro'] = $date;

        $usuario = Usuario::create($campos);

        return response()->json( [ $usuario],201);
        }
    }

    /**
     * Display the specified resource.
     *
     *  @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
          $dato = $request->attributes->get('nombre');
          return 'xddd'; //response()->json(['data'=> $dato],201);
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
