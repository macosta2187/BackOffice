<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Chofer;
use App\Models\Camiones;
use App\Models\Fletes;


class VehiculoController extends Controller


{

    public function validarInsertar(Request $request)
    {
        return $request->validate([
            'matricula' => 'required|string|max:7',
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:20',
            'peso_camion' => 'required|numeric|between:0,9999999.99',
            'capacidad_camion' => 'required|numeric|between:0,9999999.99',     
        ]);
    }
    

    public function Insertar(Request $request)
    {
        try {
            $validatedData = $this->validarInsertar($request);
            $vehiculo = new Vehiculo;
            $vehiculo->matricula = $validatedData['matricula'];
            $vehiculo->marca = $validatedData['marca'];
            $vehiculo->modelo = $validatedData['modelo'];
            $vehiculo->peso_camion = $validatedData['peso_camion'];
            $vehiculo->capacidad_camion = $validatedData['capacidad_camion'];  
            $vehiculo->op_camion = $request->has('op_camion');
            $vehiculo->op_flete = $request->has('op_flete');          
            $vehiculo->save();
            
         
            if ($request->has('op_camion')) {                
                $camion = new Camiones;
                $camion->id_camion = $vehiculo->id;
                $camion->save();
            }
    
            if ($request->has('op_flete')) {       
                $flete = new Fletes;
                $flete->id_flete = $vehiculo->id;
                $flete->save();
            }
    
            return 'Vehículo insertado con éxito'; 
        } catch (\Exception $e) {
            return 'Error al insertar el Vehículo: ' . $e->getMessage(); 
        }
    }
  


    public function Eliminar($id)
    {
        try {
            $vehiculo = Vehiculo::find($id);
    
            if (!$vehiculo) {
                return 'Vehículo no encontrado';
            }
    
            $vehiculo->delete();
    
            return 'Vehículo eliminado con éxito';
        } catch (\Exception $e) {
            return 'Error al eliminar el Vehículo: ' . $e->getMessage();
        }
    }
    


    public function Listar()
    {

        $vehiculo = Vehiculo::all();

        return view('vehiculos.Listar', ['vehiculos' => $vehiculo]);
    }

    public function Editar(Vehiculo $vehiculo)
    {
        return view('vehiculos.Editar', compact('vehiculo'));
    }



    
    public function Actualizar(Request $request, $id)
    {
        try {
            $validatedData = $this->validarInsertar($request);
            $vehiculo = Vehiculo::find($id);
    
            if (!$vehiculo) {
                return 'Vehículo no encontrado';
            }
    
            $vehiculo->matricula = $validatedData['matricula'];
            $vehiculo->marca = $validatedData['marca'];
            $vehiculo->modelo = $validatedData['modelo'];
            $vehiculo->peso_camion = $validatedData['peso_camion'];
            $vehiculo->capacidad_camion = $validatedData['capacidad_camion'];
            $vehiculo->op_camion = $request->has('op_camion');
            $vehiculo->op_flete = $request->has('op_flete');
            $vehiculo->save();
    
            if ($request->has('op_camion')) {
                $camion = Camiones::updateOrInsert(
                    ['id_camion' => $vehiculo->id],
                    ['updated_at' => now()]
                );
            } else {
                Camiones::where('id_camion', $vehiculo->id)->delete();
            }
    
            if ($request->has('op_flete')) {
                $flete = Fletes::updateOrInsert(
                    ['id_flete' => $vehiculo->id],
                    ['updated_at' => now()]
                );
            } else {
                Fletes::where('id_flete', $vehiculo->id)->delete();
            }
    
            return 'ok';
        } catch (\Exception $e) {
            return 'Error al actualizar el Vehículo: ' . $e->getMessage();
        }
    }
    

    
    
}
