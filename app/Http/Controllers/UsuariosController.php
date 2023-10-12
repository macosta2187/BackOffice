<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function RegistroUsuario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:25',
            'contraseña' => 'required|string|max:255',
            'es_almacen' => 'boolean',
            'es_chofer' => 'boolean',
        ]);
    
        $user = new Usuarios;
        $user->nombre = $request->input('nombre');
        $user->contraseña = Hash::make($request->input('contraseña'));
        $user->es_almacen = $request->input('es_almacen', 0); 
        $user->es_chofer = $request->input('es_chofer', 0); 
        $user->save();
    }
    
    



}
