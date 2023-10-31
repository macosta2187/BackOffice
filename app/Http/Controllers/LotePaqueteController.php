<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Paquete;
use App\Models\Vehiculo;
use App\Models\Camiones;
use App\Models\Fletes;
use App\Models\LotePaquete;

class LotePaqueteController extends Controller
{
    public function LotePaquete()
    {
        $lotesPaquetes = LotePaquete::with('lote.camion', 'paquete')->get();    
        return view('LotePaquete', compact('lotesPaquetes'));
    }

 


    
    public function listarFletes()
{
    $lotesPaquetes = LotePaquete::with('lote.camion', 'paquete')->get();    
    $fletes = Fletes::all();
   
    return view('/fletes', compact('fletes', 'lotesPaquetes'));
}





}
