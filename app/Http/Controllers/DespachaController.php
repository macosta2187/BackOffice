<?php

namespace App\Http\Controllers;

use App\Models\Creas;
use App\Models\Lote;
use App\Models\Despacha;
use App\Models\Paquete;
use App\Models\Almacena;
use App\Models\Almacen;
use App\Models\Clientes;
use Illuminate\Support\Facad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;


class DespachaController extends Controller


{
    public function Insertar(Request $request)
    {
        try {
            $departamentoPaquete = $request->input('departamento_paquete');
            
            $almacen = Almacen::where('departamento', $departamentoPaquete)->first();
    
            $id_almacen = 0;
    
            if ($almacen) {
                $id_almacen = $almacen->id;
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

            return response('Registro insertado correctamente', 200);
        } catch (\Exception $e) {            
            return response('Error al insertar el registro: ' . $e->getMessage(), 500);
        }
    }
    
    
    
}
