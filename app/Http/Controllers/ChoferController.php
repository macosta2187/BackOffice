<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Chofer;

class ChoferController extends Controller
{
    

    public function mostrarVistaIngresar()
{
    
    $choferes = Chofer::all();     
    return view('vehiculos.Insertar', compact('choferes'));
}

}
