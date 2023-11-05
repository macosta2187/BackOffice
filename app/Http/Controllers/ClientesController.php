<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    public function Insertar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'ci' => 'required|string|max:8|unique:clientes',
            'direccion' => 'required|string|max:50',
            'departamento' => 'required|string|max:50',
            'telefono' => 'required|max:9',
        ]);

        if ($validator->fails()) {
            return 'Error de validación: ' . implode(', ', $validator->errors()->all());
        }

        try {
            $cliente = new Clientes;
            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->email = $request->input('email');
            $cliente->ci = $request->input('ci');
            $cliente->direccion = $request->input('direccion');
            $cliente->departamento = $request->input('departamento');
            $cliente->telefono = $request->input('telefono');
            $cliente->save();

            return 'ok';
        } catch (\Exception $e) {
            return 'Error al insertar cliente: ' . $e->getMessage();
        }
    }

    public function Eliminar($id)
    {
        try {
            $cliente = Clientes::find($id);

            if (!$cliente) {
                return 'Cliente no encontrado';
            }

            $cliente->delete();

            return 'ok';
        } catch (\Exception $e) {
            return 'Error al eliminar el cliente: ' . $e->getMessage();
        }
    }

    public function Actualizar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'ci' => ['required', 'string', 'max:8', Rule::unique('clientes')->ignore($id)],
            'direccion' => 'required|string|max:50',
            'departamento' => 'required|string|max:50',
            'telefono' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return 'Error de validación: ' . implode(', ', $validator->errors()->all());
        }

        try {
            $cliente = Clientes::find($id);

            if (!$cliente) {
                return 'Cliente no encontrado';
            }

            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->email = $request->input('email');
            $cliente->ci = $request->input('ci');
            $cliente->direccion = $request->input('direccion');
            $cliente->departamento = $request->input('departamento');
            $cliente->telefono = $request->input('telefono');
            $cliente->save();

            return 'ok';
        } catch (\Exception $e) {
            return 'Error al actualizar el cliente: ' . $e->getMessage();
        }
    }

    public function Listar()
{
    $clientes = Clientes::all(); 
    return view('clientes.Listar', compact('clientes'));
}

public function Editar($id)
{
    $cliente = Clientes::find($id); 

    if (!$cliente) {
        return 'Cliente no encontrado';
    }

    return view('clientes.Editar', compact('cliente'));
}



}
