<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Chofer;
use App\Models\Camiones;
use App\Models\Fletes;
use App\Models\Paquete;


class FletesController extends Controller
{
 

    public function Listar()
    {
        $fletes = Fletes::all(); 
        $paquetes = Paquete::where('estado', 'En almacén destino')->get();
        
        return view('fletes', compact('fletes', 'paquetes'));
    }
    

    
    
}