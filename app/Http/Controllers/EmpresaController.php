<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\Paquetes;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    
    public function Insertar(Request $request)
    {
       
        $rules = [
            'RUT' => 'required|string|max:12|unique:empresas',
            'nombre' => 'required|string|max:25',
            'calle' => 'required|string|max:50',
            'numero' => 'required|integer',
            'localidad' => 'required|string|max:25',
            'departamento' => 'required|string|max:25',
            'telefono' => 'required|string|max:12',
        ];
    
        
        $messages = [
            'RUT.size' => 'El RUT debe tener una longitud de 12 caracteres.',
        ];
    
 
        $request->validate($rules, $messages);    
     
        $empresa = new Empresa;
        $empresa->RUT = $request->input('RUT');
        $empresa->nombre = $request->input('nombre');
        $empresa->calle = $request->input('calle');
        $empresa->numero = $request->input('numero');
        $empresa->localidad = $request->input('localidad');
        $empresa->departamento = $request->input('departamento');
        $empresa->telefono = $request->input('telefono');
        $empresa->save();
    
   
    }
    

    public function Empresa_paquetes()
    {
        $empresas = Empresa::all();
        return view('paquetes.Ingresar', compact('empresas'));
    }
    

    public function Listar()
    {
        $empresas = Empresa::all();
        return view('empresas.Listar', ['empresas' => $empresas]);
    }
    
    

    public function Eliminar(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.Listar');
    }
  


    public function Editar(Empresa $rut)
    {
        return view('empresas.Editar', compact('rut'));
    }

    
    public function Actualizar(Request $request, $rut)
    {
        $empresa = Empresa::find($rut);
    
        $request->validate([
            'nombre' => 'required|string|max:25',
            'calle' => 'required|string|max:50',
            'numero' => 'required|integer',
            'localidad' => 'required|string|max:25',
            'departamento' => 'required|string|max:25',
            'telefono' => 'required|string|max:12',
        ]);
    
        $empresa->nombre = $request->input('nombre');
        $empresa->calle = $request->input('calle');
        $empresa->numero = $request->input('numero');
        $empresa->localidad = $request->input('localidad');
        $empresa->departamento = $request->input('departamento');
        $empresa->telefono = $request->input('telefono');
        $empresa->save();
    
 
    }
}