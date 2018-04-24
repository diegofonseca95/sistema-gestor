<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosControlador extends Controller
{
    public function agregarUsuario(){

    	return view('registro');
    }

    public function index(){
    	return view('index');
    }

    public function agregarUsuarioBD(){
    	$usuario = new Usuario;
        $query = $usuario->where([['correo', '=', request('correo')]])->get();

        if($query->isNotEmpty()){
            return response()->json([
                'status'=> 'ERROR',
                'result'=> 'Ya existe una cuenta con ese correo'
                ]);
        }

    	$usuario->nombre = request('nombre');
    	$usuario->apellidoPaterno = request('apellidoPaterno');
    	$usuario->apellidoMaterno = request('apellidoMaterno');
    	$usuario->correo = request('correo');
    	$usuario->contrasena = request('contrasena');
    	$usuario->telefono = request('telefono');

    	$usuario->save();

    	return response()->json([
                'status'=> 'OK',
                ]);
    }

    public function obtenerUsuario(){

    	$usuario = new Usuario;

    	$query = $usuario->where([['correo', '=', request('correo')],['contrasena', '=', request('contrasena')]])->get();

    	if($query->isNotEmpty() && $query[0]->estado == 1){
            return response()->json([
                'status'=> 'OK'
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
