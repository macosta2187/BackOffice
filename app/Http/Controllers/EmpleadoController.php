<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Chofer;
use App\Models\funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{

    public function Insertar(Request $request)
    {
        try {
            $request->validate([
                'ci' => ['required', 'string', 'max:8', Rule::unique('empleados')],
                'nombre' => ['required', 'string', 'max:25'],
                'apellido' => ['required', 'string', 'max:25'],
                'celular' => ['required', 'integer'],
                'email' => ['required', 'string', 'email', 'max:50'],
                'fechanac' => ['required', 'date', 'before_or_equal:2005-09-22'],
                'es_chofer' => ['nullable', 'boolean'],
                'es_almacen' => ['nullable', 'boolean'],
            ]);
    
            $empleado = new Empleado;
            $empleado->ci = $request->input('ci');
            $empleado->nombre = $request->input('nombre');
            $empleado->apellido = $request->input('apellido');
            $empleado->celular = $request->input('celular');
            $empleado->email = $request->input('email');
            $empleado->fechanac = $request->input('fechanac');  
            $empleado->es_almacen = $request->input('es_almacen'); 
            $empleado->es_chofer = $request->input('es_chofer');     
        
            if (Empleado::where('ci', $empleado->ci)->exists()) {
                return view('empleados.Ingresar')->with('message', 'CI duplicada: El número de CI ya está registrado');
            }
        
            $empleado->save();
            
            return view('/home')->with('message', 'Empleado insertado con éxito');
        } catch (\Exception $e) {           
            return view('empleados.Ingresar')->with('error', 'Error al insertar el empleado: ' . $e->getMessage());
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
    return redirect('/home'); 
}



    public function Editar(Empleado $empleado)
    {
        return view('empleados.Editar', compact('empleado'));
    }

    public function Actualizar(Request $request, Empleado $empleado)
    {
        $request->validate([
            'ci' => ['required', 'string', 'max:8', Rule::unique('empleados')->ignore($empleado->id)],
            'nombre' => ['required', 'string', 'max:25'],
            'apellido' => ['required', 'string', 'max:25'],
            'celular' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'fechanac' => ['required', 'date', 'before_or_equal:2005-09-22'],
            'es_chofer' => ['nullable', 'boolean'],
            'es_almacen' => ['nullable', 'boolean'],
        ]);
    
        $empleado->ci = $request->input('ci');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->celular = $request->input('celular');
        $empleado->email = $request->input('email');
        $empleado->fechanac = $request->input('fechanac');
        $empleado->es_almacen = $request->input('es_almacen'); 
        $empleado->es_chofer = $request->input('es_chofer');   
        $empleado->save();
    
        return redirect('/home'); 
    }
    
    public function listarChoferes()
{
    $choferes = Empleado::where('es_chofer', true)->get();

    return view('/vehiculos/Ingresar', ['choferes' => $choferes]);
}

}
