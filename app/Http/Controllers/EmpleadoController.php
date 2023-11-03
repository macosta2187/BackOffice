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


    public function ValidarInsertar(Request $request)
{
    $request->validate([
        'ci' => ['required', 'string', 'max:8', 'unique:empleados'],
        'nombre' => ['required', 'string', 'max:25'],
        'apellido' => ['required', 'string', 'max:25'],
        'celular' => ['required', 'string', 'max:9'],
        'email' => ['required', 'string','max:50'],
        'contraseña' => ['required', 'string', 'max:12'],
    ]);
}

public function Insertar(Request $request)
{
    try {
        $this->ValidarInsertar($request); 

        // Crear un nuevo empleado
        $empleado = new Empleado;
        $empleado->ci = $request->input('ci');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->celular = $request->input('celular');
        $empleado->email = $request->input('email');
        $empleado->contraseña = bcrypt($request->input('contraseña'));
        $empleado->op_chofer = $request->input('op_chofer');
        $empleado->op_almacen = $request->input('op_almacen');    
        $empleado->save();

        if ($empleado->op_chofer) {
            $chofer = new Chofer;
            $chofer->empleado_id = $empleado->id; 
            $chofer->save();
        }

       
        if ($empleado->op_almacen) {
            $funcionario = new Funcionario;
            $funcionario->empleado_id = $empleado->id; 
            $funcionario->save();
        }
        
        
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
            'contraseña' => ['required', 'string', 'max:12'],
         
        ]);
    
        $empleado->ci = $request->input('ci');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->celular = $request->input('celular');
        $empleado->email = $request->input('email');
        $empleado->contraseña = bcrypt($request->input('contraseña')); 
        $empleado->op_chofer = $request->input('op_chofer');
        $empleado->op_almacen = $request->input('op_almacen'); 
        $empleado->save();
    
        
    }
    
    public function listarChoferes()
{
    $choferes = Empleado::where('op_chofer', true)->get();

    return view('/vehiculos/Ingresar', ['choferes' => $choferes]);
}

}
