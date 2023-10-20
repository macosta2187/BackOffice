<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Chofer;
use App\Models\Camiones;


class VehiculoController extends Controller


{

    public function validarInsertar(Request $request)
{
    return $request->validate([
        'matricula' => 'required|string|max:7|unique:vehiculos',
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
        $vehiculo->save();

        $camion = new Camiones;
        $camion->id_camion = $vehiculo->id; 
        $camion->save();
       


        return 'Vehiculo insertado con éxito'; 
    } catch (\Exception $e) {
        return 'Error al insertar el Vehiculo: ' . $e->getMessage(); 
    }
}
    


    public function Eliminar($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
       
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



    public function Actualizar(Request $request, Vehiculo $vehiculo)
    {
        try {
            $validatedData = $this->validarInsertar($request);
    
            $vehiculo->matricula = $validatedData['matricula'];
            $vehiculo->marca = $validatedData['marca'];
            $vehiculo->modelo = $validatedData['modelo'];
            $vehiculo->peso_camion = $validatedData['peso_camion'];
            $vehiculo->capacidad_camion = $validatedData['capacidad_camion'];
            $vehiculo->save();
    
            return 'Vehículo actualizado con éxito';
        } catch (\Exception $e) {
            return 'Error al actualizar el vehículo: ' . $e->getMessage();
        }
    }
    

    
    
}
