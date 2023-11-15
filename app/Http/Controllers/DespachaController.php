<?php

namespace App\Http\Controllers;

use App\Models\Creas;
use App\Models\Lote;
use App\Models\Despacha;
use App\Models\Paquete;
use App\Models\Almacena;
use App\Models\Almacen;
use App\Models\Clientes;
use Illuminate\Support\Facad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;


class DespachaController extends Controller


{



    public function enviarCorreoFletes($correoDestino) {
    
        $nombreDestino = ''; 
    
        $datos = [
            'mensaje' => 'Su paquete esta en viaje a su domicilio',
        ];
          
       
        if (!empty($correoDestino)) {
            Mail::send('correo.mensaje', $datos, function($message) use ($correoDestino, $nombreDestino) {
                $message->to($correoDestino, $nombreDestino)
                        ->subject('Información de Sistema Automática');
            });
    
            return "Correo enviado a $correoDestino.";
        } else {
            return "No se pudo enviar el correo";
        }
    }
    
    



    public function Insertar(Request $request)
    {
        try {
            $departamentoPaquete = $request->input('departamento_paquete');
    
            $almacen = Almacen::where('departamento', $departamentoPaquete)->first();
    
           
            $id_almacen = 1;
            
            if ($almacen) {
                $id_almacen = $almacen->id;
            }
    
            $registro = new Despacha;
            $registro->id_flete = $request->input('id_flete');
            $registro->id_paquetes = $request->input('paquete_id');
            $registro->id_almacen = $id_almacen;
            $registro->fecha = now();
            $registro->hora = now();
            $registro->save();
    
            $paquete = Paquete::find($request->input('paquete_id'));
            if ($paquete->estado === 'En almacén destino') {
               
                $cliente = $paquete->cliente;
    
                if ($cliente) {
                    $correoCliente = $cliente->email;
                    $resultado = $this->enviarCorreoFletes($correoCliente);
                    
                }    
                
                $paquete->delete();
            }
    
            return response('ok', 200);
        } catch (\Exception $e) {            
            return response('Error al insertar: ' . $e->getMessage(), 500);
        }
    }
    

    
    
}
