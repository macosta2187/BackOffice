<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Http\Controllers\CreasController;
use App\Models\Lote;
use App\Models\Camiones;
use App\Models\Creas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\TrackingController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;




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
        //'estado' => 'required|in:Ingresado,En almacen origen,En transito,En almacen destino,Disponible en pick up,En distribucion,Reagenda entrega,Entregado',
      
        
        
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


       
       $identificadorUnico = $request->input('identificadorUnico');
       $codigoDeSeguimiento = $this->obtenerTracking($identificadorUnico);
       $paquete->codigo_seguimiento = $codigoDeSeguimiento; 

       $paquete->save();

        return 'Paquete insertado con éxito'; 
    } catch (\Exception $e) {
        return 'Error al insertar el paquete: ' . $e->getMessage(); 
    }
}

public function guardarRelacion($id_empleado, $id_paquete)
{
    $creas = new Creas();
    $creas->id_func = $id_empleado;
    $creas->id_paquete = $id_paquete;
    $creas->save();
}


public function consolidar(Request $request)
{
    $camionId = $request->input('selectedCamion');
    $id_paquete = $request->input('selectedPackages');
    
 
    $paquetesSeleccionados = json_decode($id_paquete, true)['Paquetes'];

    
    $loteModel = new Lote();
    $loteModel->camionId = $camionId;
    $loteModel->estado = 'Consolidado';
    $loteModel->save();

    $loteModel->paquetes()->attach($paquetesSeleccionados);


    Paquete::whereIn('id', $paquetesSeleccionados)->delete();

    return redirect()->back()->with('success', 'Paquetes consolidados correctamente y se eliminó la referencia en Paquete.');
}


public function listarPaquetes()
{
    $camiones = Camiones::all();
    $paquetes = Paquete::all(); 
    return view('paquetes.listar', compact('camiones', 'paquetes'));
}

public function obtenerTracking($identificadorUnico) {
    $fechaHoraActual = now();
    $año = $fechaHoraActual->year;
    $mes = str_pad($fechaHoraActual->month, 2, '0', STR_PAD_LEFT);
    $dia = str_pad($fechaHoraActual->day, 2, '0', STR_PAD_LEFT);
    $hora = str_pad($fechaHoraActual->hour, 2, '0', STR_PAD_LEFT);
    $minutos = str_pad($fechaHoraActual->minute, 2, '0', STR_PAD_LEFT);
    $segundos = str_pad($fechaHoraActual->second, 2, '0', STR_PAD_LEFT);

    
    $codigoDeSeguimiento = "TRACK_ADN2018" . $año . $mes . $dia . $hora . $minutos . $segundos . $identificadorUnico;

    return $codigoDeSeguimiento;
}


public function registro()
{
    $paquetes = Paquete::all();
    return view('paquetes.ingresados', ['paquetes' => $paquetes]);
}

public function Editar($id)
{
    $paquetes = Paquete::find($id);
    return view('paquetes.Editar', ['paquetes' => $id]);
}


}