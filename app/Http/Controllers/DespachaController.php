<?php

namespace App\Http\Controllers;

use App\Models\Creas;
use App\Models\Lote;
use App\Models\Despacha;
use App\Models\Paquete;
use App\Models\Almacena;
use Illuminate\Support\Facad;
use Illuminate\Http\Request;


class DespachaController extends Controller
{
    public function Insertar(Request $request)
    {

   $almacena = Almacena::where('id_paquete', $request->input('paquete_id'))->first();

  if ($almacena) {
        
        $id_almacen = $almacena->id_almacen;
    } else {
    
        $id_almacen = 0; 
    }

    $registro = new Despacha;
    $registro->id_flete = $request->input('id_flete');
    $registro->id_paquetes = $request->input('paquete_id');
    $registro->id_almacen = $id_almacen;
    $registro->fecha = now();
    $registro->hora = now();
    $registro->save();


    $paquete = Paquete::find($request->input('paquete_id'));
    if ($paquete->estado === 'En almacén destino') {
        $paquete->delete();

       }
    }
}
