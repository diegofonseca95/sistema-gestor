<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class SesionControlador extends Controller
{
    public function iniciarSesion(){

    	$usuario = new Usuario;

        $query = $usuario->where([['correo', '=', request('correo')],['contrasena', '=', request('contrasena')]])->get();

        if($query->isNotEmpty() && $query[0]->estado == 1){
            return response()->json([
                'status'=> 'OK',
                'result'=> '/administrarUsuarios'
                ]);
        }else if($query->isNotEmpty() && $query[0]->estado == 2){
            return response()->json([
                'status'=> 'ERROR',
                'result'=> 'Usuario no validado. Pongase en contacto con el administrador'
                ]);
        }else{
            return response()->json([
                'status'=> 'ERROR',
                'result'=> 'Correo ó contraseña incorrecto'
                ]);
        }
    }
}
