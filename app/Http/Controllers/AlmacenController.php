<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Almacen;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;


class AlmacenController extends Controller
{



    public function ValidarInsertar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:25',
            'calle' => 'required|max:50',
            'numero' => 'required|integer',
            'localidad' => 'required|max:50',
            'departamento' => 'required|max:50',
            'telefono' => 'required|integer',
        ]);
    }
    
    public function Insertar(Request $request)
    {
        try {
            $this->ValidarInsertar($request);
    
            $almacen = new Almacen;
            $almacen->nombre = $request->input('nombre');
            $almacen->calle = $request->input('calle');
            $almacen->numero = $request->input('numero');
            $almacen->localidad = $request->input('localidad');
            $almacen->departamento = $request->input('departamento');
            $almacen->telefono = $request->input('telefono');
            $almacen->save();
    
           
        } catch (\Exception $e) {
            return view('almacenes/Ingresar')->with('error', 'Error al insertar el almacén: ' . $e->getMessage());
        }
    }
    


    public function Listar()
    {
       
       $almacenes = Almacen::all();
        return view('almacenes.Listar', ['almacenes' => $almacenes]);
    }

    public function eliminar($id)
    {        
        $almacen = Almacen::find($id);         
        $almacen->delete();  
      
        
    }
    

   public function Editar(Almacen $almacen)
{
    return view('almacenes.Editar', compact('almacen'));
}
    
public function Actualizar(Request $request, Almacen $almacen)
{
    $request->validate([
        'nombre' => 'required|string|max:25',
        'calle' => 'required|string|max:50',
        'numero' => 'required|integer',
        'localidad' => 'required|string|max:50',
        'departamento' => 'required|string|max:50',
        'telefono' => 'required|integer',
    ]);

    $almacen->nombre = $request->input('nombre');
    $almacen->calle = $request->input('calle');
    $almacen->numero = $request->input('numero');
    $almacen->localidad = $request->input('localidad');
    $almacen->departamento = $request->input('departamento');
    $almacen->telefono = $request->input('telefono');
    $almacen->save();
}





}