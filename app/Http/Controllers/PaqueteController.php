<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Lote;
use App\Models\Camiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaqueteController extends Controller
{


    public function ValidarInsertar(Request $request)
{
    return $request->validate([
        'descripcion' => 'required|max:50',
        'calle' => 'required|max:50',
        'numero' => 'required|integer|max:99999',
        'localidad' => 'required|max:25',
        'departamento' => 'required|max:25',
        'telefono' => 'required|max:9',
        'estado' => 'required|in:Ingresado,En almacen origen,En transito,En almacen destino,Disponible en pick up,En distribucion,Reagenda entrega,Entregado',
      
        
        
    ]);
}


public function Insertar(Request $request)
{
    try {
        $this->ValidarInsertar($request);

        $paquete = new Paquete;
        $paquete->descripcion = $request->input('descripcion');
        $paquete->calle = $request->input('calle');
        $paquete->numero = $request->input('numero');
        $paquete->localidad = $request->input('localidad');
        $paquete->departamento = $request->input('departamento');
        $paquete->telefono = $request->input('telefono');
        $paquete->estado = $request->input('estado');
        $paquete->tamaño = $request->input('tamaño');
        $paquete->peso = $request->input('peso');
        $paquete->fecha_creacion = $request->input('fecha_creacion');
        $paquete->hora_creacion = $request->input('hora_creacion');
        $paquete->save();

        return 'Paquete insertado con éxito'; 
    } catch (\Exception $e) {
        return 'Error al insertar el paquete: ' . $e->getMessage(); 
    }
}


public function consolidar(Request $request)
{
    $camionId = $request->input('selectedCamion');
    $id_paquete = $request->input('selectedPackages');
    
    // Convierte los paquetes seleccionados en un arreglo
    $paquetesSeleccionados = json_decode($id_paquete, true)['Paquetes'];

    // Crear un nuevo lote
    $loteModel = new Lote();
    $loteModel->camionId = $camionId;
    $loteModel->estado = 'Consolidado';
    $loteModel->save();

    // Asigna los paquetes seleccionados al lote
    $loteModel->paquetes()->attach($paquetesSeleccionados);

    // Elimina la referencia de los paquetes en la tabla Paquete
    Paquete::whereIn('id', $paquetesSeleccionados)->delete();

    return redirect()->back()->with('success', 'Paquetes consolidados correctamente y se eliminó la referencia en Paquete.');
}


/*

public function consolidar(Request $request)
{
    
    $camionId = $request->input('selectedCamion');
    $id_paquete = $request->input('selectedPackages');

    $obj = json_decode($id_paquete, true);
    $obj = $obj['Paquetes'];

    
        $loteModel = new Lote();
        $loteModel->camionId = $camionId;
        $loteModel->estado = 'Consolidado';    
        $loteModel->save(); 
        $loteModel->paquetes()->attach($obj);
    
    
    //$loteModel->paquetes()->attach($obj);
   
    Paquete::whereIn('id', $id_paquete)->delete();

    return redirect()->back()->with('success', 'Paquetes consolidados correctamente y se eliminó la referencia en Paquete.');
}
*/

/*

public function consolidar(Request $request)
{
    //$lote = $request->input('inputLote');
    $camionId = $request->input('selectedCamion');
    $id_paquetes = $request->input('selectedPackages');

    if (!is_array($id_paquetes)) {
        $id_paquetes = [$id_paquetes];
    }

    // Creo lote
    $loteModel = new Lote();
    $loteModel->camionId = $camionId;
    $loteModel->estado = 'Consolidado';
    $loteModel->save();

    foreach ($id_paquetes as $paquete) {
        $loteModel->paquetes()->attach($paquete); 
    }

    Paquete::whereIn('id', $id_paquetes)->delete();

    return redirect()->back()->with('success', 'Paquetes consolidados correctamente y se eliminó la referencia en Paquete.');
}
*/





    



public function listarPaquetes()
{
    $camiones = Camiones::all();
    $paquetes = Paquete::all(); 
    return view('paquetes.listar', compact('camiones', 'paquetes'));
}

}