<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class GruposControlador extends Controller
{
    public function administrarGrupos(){
    	return view('admin_manage_groups');
    }

    public function agregarGrupo(){

    	$usuario = new Usuario;
    	$query = $usuario->get();

    	return view('admin_create_groups', [ 'usuarios' => $query]);
    }

    public function obtenerLider(){
    	$usuario = new Usuario;
    	$query = $usuario->whereIn('idUsuario', request("usuarios"))->get();

    	return view('tabla_lider',['usuarios' => $query]);
    }

    public function agregarGrupoBD(){
    	$nombre = request("nombreGrupo");
    	$descr = request("descripcion");
    	$inte = request("integrantes");
    	$lider = request("lider");
    	
    	return request("integrantes");
    }
}
