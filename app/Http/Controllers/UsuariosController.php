<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function RegistroUsuario(Request $request)
    {
        $user = new Usuarios;                  
        $user->nombre = $request->input('nombre');          
        $user->contraseña = Hash::make($request->input('contraseña'));
        $user->es_almacen = $request->input('es_almacen');
        $user->es_chofer = $request->input('es_chofer');      
    
        $user->save();
    }
    



}
