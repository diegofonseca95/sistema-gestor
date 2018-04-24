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

    	$usuario->nombre = request('nombre');
    	$usuario->apellidoPaterno = request('apellidoPaterno');
    	$usuario->apellidoMaterno = request('apellidoMaterno');
    	$usuario->correo = request('correo');
    	$usuario->contrasena = request('contrasena');
    	$usuario->telefono = request('telefono');

    	$usuario->save();
    	return redirect('/');
    }

    public function obtenerUsuario(){

    	$usuario = new Usuario;

    	$query = $usuario->where([['correo', '=', request('correo')],['contrasena', '=', request('contrasena')],['estado','=', 1]])->get();

    	if($query->isNotEmpty())
    		return view('admin_users');
    	
    	return view('index');
    }
}
