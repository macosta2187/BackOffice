<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EmpleadoController extends Controller
{

    public function Insertar(Request $request)
    {
        try {
            $empleado = new Empleado;
            $empleado->ci = $request->input('ci');
            $empleado->nombre = $request->input('nombre');
            $empleado->apellido = $request->input('apellido');
            $empleado->celular = $request->input('celular');
            $empleado->email = $request->input('email');
            $empleado->fechanac = $request->input('fechanac');         
            $empleado->save();

            if ($request->input('emplAlmacen')) {
                $emplAlmacen = new funcionarios;
                $emplAlmacen->empleado_id = $empleado->id; 
                $emplAlmacen->save();
            }
            
            if ($request->input('chofer')) {
                $chofer = new Chofer;
                $chofer->empleado_id = $empleado->id; 
                $chofer->save();
            }
            
        } catch (\Exception $e) {
           
            return response()->json(['error' => 'Error al insertar el empleado: ' . $e->getMessage()], 500);
        }
    }

    public function Listar()
    {
        $empleados = Empleado::all();
        return view('empleados.Listar', compact('empleados'));
    }
    


    public function eliminar($id)
{
    $empleado = Empleado::find($id);
    $empleado->delete();
   
}



    public function Editar(Empleado $empleado)
    {
        return view('empleados.Editar', compact('empleado'));
    }

    public function Actualizar(Request $request, Empleado $empleado)
    {
        $empleado = new Empleado;
        $empleado->ci = $request->input('ci');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->celular = $request->input('celular');
        $empleado->email = $request->input('email');
        $empleado->fechanac = $request->input('fechanac');  
        $empleado->save();

        return redirect("/");
    }

}
