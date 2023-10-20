<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Paquete;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{

  /*
    public function asignarLote(Request $request)
    {
        $paquete = $request->input('Paquetes');
    
       
            $lote = new Lote();
            
            $lote->camionId = $paquete['camionId'];
            $lote->id_paquete = $paquete['id_paquete'];
            $lote->estatus = $paquete['estatus'];
            $lote->save();
    
        
            $paqueteExistente = Paquete::find($paquete['paqueteId']);
    
            if ($paqueteExistente) {
                $paqueteExistente->delete();
            }
    
        
    }
*/

public function asignarLote(Request $request)
{
    // Obtener los datos enviados a través de la solicitud AJAX
    $paquetes = $request->input('paquetes');
    $camion = $request->input('camion');
    $lote = $request->input('lote');

    // Realizar las operaciones necesarias para guardar los datos en la base de datos
    // Por ejemplo, puedes utilizar Eloquent para crear registros en la tabla correspondiente

    // Ejemplo (puedes ajustarlo según tu estructura de base de datos):
    foreach ($paquetes as $paqueteId) {
        $paquete = Paquete::find($paqueteId);

        // Asignar el camión y el lote al paquete
        $paquete->camion_id = $camion;
        $paquete->lote = $lote;

        // Guardar los cambios en el paquete
        $paquete->save();
    }

    // Puedes retornar una respuesta JSON si deseas enviar una respuesta al cliente
    return response()->json(['message' => 'Datos guardados correctamente']);
}

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
    
            return redirect()->route('/');
        
        
    }

    public function mostrarCamionAsignado($loteId)
    {
        // Encuentra el lote por su ID
        $lote = Lote::find($loteId);

        // Verifica si se encontró el lote
        if (!$lote) {
            return abort(404); // Puedes personalizar la respuesta si el lote no se encuentra.
        }

        // Accede al camión asignado al lote
        $camionAsignado = $lote->camion;

        // Renderiza una vista y pasa los datos del lote y camión a la vista
        return view('mostrarCamionAsignado', [
            'lote' => $lote,
            'camionAsignado' => $camionAsignado,
        ]);
    }

}

    
    
   
    
    