<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Paquete;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    /*
    public function IngresarLote(Request $request)
    {
                 
        $lote = new Lote();              
        $lote->id = $request->input('lote');  
        $lote->save();

      }
      

public function editarLote($id)
      {
          $lote = Lote::findOrFail($id);  
          return view('EditarLote', compact('lote'));
      }
  
public function actualizarLote(Request $request, $id)
      {
          $lote = Lote::findOrFail($id);  
          $lote->id = $request->input('lote');    
          $lote->save();
          
          return view('inicio');
      }


public function EliminarLote($id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();

        return view('inicio');
    }
    

public function ListarLote()
    {
        $lote = Lote::all();
        return view('ListarLote', compact('lote'));
    }


  
    public function asignarLote(Request $request)
    {
        $paquete = $request->input('Paquetes');
    
        if ($paquete !== null && is_array($paquete) && isset($paquete['lote']) && isset($paquete['estatus']) && isset($paquete['paqueteId']) && isset($paquete['camionId'])) {
            $lote = new Lote();
            $lote->lote = $paquete['lote'];
            $lote->estatus = $paquete['estatus'];
            $lote->paqueteId = $paquete['paqueteId'];
            $lote->camionId = $paquete['camionId'];
            $lote->save();
    
        
            $paqueteExistente = Paquete::find($paquete['paqueteId']);
    
            if ($paqueteExistente) {
                $paqueteExistente->delete();
            }
    
          
            return redirect()->route('inicio');
        } else {
            return redirect("/");
       
        }
        */


        public function ingresarLote(Request $request)
        {
            $request->validate([
                'lote' => 'required|integer|min:1', 
            ]);
    
           
            $lote = new Lote();
            $lote->numero = $request->input('lote');
            $lote->save();
    
            return redirect()->route('paquetes/Listar'); 
        }


       
        public function crearLotes(Request $request)
        {
            
            $request = $request->json()->all();
    
            if (!is_array($request) || empty($request)) {
                return response()->json(['message' => 'Error en el formato de datos'], 400);
            }     
    
            $paquetesAConsolidar = $request['Paquetes'];
    
            foreach ($paquetesAConsolidar as $paquete) {
            $lote = new Lote();
            $lote->lote = $paquete['lote'];
            $lote->estatus = $paquete['estatus'];
            $lote->paqueteId = $paquete['paqueteId'];
            $lote->camionId = $paquete['camionId'];        
            $lote->save();
            Paquete::where('id', $paquete['paqueteId'])->delete();
            }        
    
            return response()->json(['message' => 'Lotes guardados exitosamente'], 200);
        
        
    }

}

    
    
   
    
    