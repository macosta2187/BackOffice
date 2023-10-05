<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function Insertar(Request $request)
    {
        $empresa = new Empresa;
        $empresa->rut = $request->input('rut');
        $empresa->nombre = $request->input('nombre');
        $empresa->calle = $request->input('calle');
        $empresa->numero = $request->input('numero');
        $empresa->localidad = $request->input('localidad');
        $empresa->departamento = $request->input('departamento');        
        $empresa->telefono = $request->input('telefono'); 
        $empresa->save();
        
        return redirect("/");
    }

    public function Listar()
    {
        $empresas = Empresa::all();
        return view('empresas.Listado', ['empresas' => $empresas]);
    }
    
    

    public function eliminar($rut)
    {
        $empresa = Empresa::find($rut);         
        $empresa->delete();
    
        return redirect("/home");
    }

    public function Editar($rut)
    {
        $empresa = Empresa::find($rut);
        return view('empresas.Editar', compact('empresa'));
    }
    
    public function Actualizar(Request $request, $rut)
    {
        $empresa = Empresa::find($rut);
        $empresa->nombre = $request->input('nombre');
        $empresa->calle = $request->input('calle');
        $empresa->numero = $request->input('numero');
        $empresa->localidad = $request->input('localidad');
        $empresa->departamento = $request->input('departamento');        
        $empresa->telefono = $request->input('telefono');   
        $empresa->save();    

        return redirect("/");
    }
}