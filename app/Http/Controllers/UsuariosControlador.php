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

    public function administrarUsuarios(){
        return view('admin_users');
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

    public obtenerUsuario(){
        $usuario = new Usuario;
        $query = $usuario->where(['idUsuario','=', request('idUsuario')]);

        return $query;
    }

    public obtenerUsuarios(){
        $usuario = new Usuario;
        
        return $usuario->get();
    }

    public validarUsuario(){
        $usuario = App\Usuario::find(request('idUsuario');

        if($usuario->estado == 2){
            $usuario->estado = 1;
            $usuario->save();
            return response()->json([
                'status'=> 'OK',
                'result'=> '/'
                ]);
        }
        
        else if($usuario->estado == 1){
            return response()->json([
                'status'=> 'ERROR',
                'result'=> 'El usuario ya había sido validado'
                ]);
        }
        else return response()->json([
                'status'=> 'ERROR',
                'result'=> 'Usuario no existe'
                ]);
    }

    public eliminarUsuario(){
        $usuario = new Usuario;

        $query = $usuario->where(['idUsuario', '=', request('idUsuario')]);

        if($query->isNotEmpty()){
            $query->estado = 0;
            $query->save();

            return response()->json([
                'status'=> 'OK',
                'result'=> '/'
                ]);
        }else{
            return response()->json([
                'status'=> 'ERROR',
                'result'=> 'Usuario no existe'
                ]);
        }
    }

}
