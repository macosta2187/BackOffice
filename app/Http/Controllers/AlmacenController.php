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



    public function Insertar(Request $request)
    {

        $almacen = new Almacen;
        $almacen->nombre = $request->input('nombre');
        $almacen->calle = $request->input('calle');
        $almacen->numero = $request->input('numero');
        $almacen->localidad = $request->input('localidad');
        $almacen->departamento = $request->input('departamento');        
        $almacen->telefono = $request->input('telefono'); 
        $almacen->save();

        return redirect("/home");
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
    
      
        return redirect("/home");
    }
    

   public function Editar(Almacen $almacen)
{
    return view('almacenes.Editar', compact('almacen'));
}
    
public function Actualizar(Request $request, Almacen $almacen)

{
   
    $almacen = new Almacen;
    $almacen->nombre = $request->input('nombre');
    $almacen->calle = $request->input('calle');
    $almacen->numero = $request->input('numero');
    $almacen->localidad = $request->input('localidad');
    $almacen->departamento = $request->input('departamento');        
    $almacen->telefono = $request->input('telefono');   
    $almacen->save();    

    
    return redirect("/");
}





}