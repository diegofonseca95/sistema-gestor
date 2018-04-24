<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class SesionControlador extends Controller
{
    public function iniciarSesion(){
    	$usuario = new Usuario;

    	$query = $usuario->where([['correo', '=', request('correo')],['contrasena', '=', request('contrasena')]])->get();

    	if($query->isNotEmpty()){
    		
    		session(['idUsuario' => $query[0]->idUsuario]);
    		session(['nombre' => $query[0]->nombre]);
    		return view("welcome");
    	}
    	return redirect('/');
    }
}
