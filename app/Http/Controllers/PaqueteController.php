<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Http\Controllers\CreasController;
use App\Models\Lote;
use App\Models\Camiones;
use App\Models\LotePaquete;
use App\Models\Almacena;
use App\Models\Almacen;
use App\Models\Creas;
use App\Models\Clientes;
use App\Models\Despacha;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\TrackingController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;




class PaqueteController extends Controller
{


    public function ValidarInsertar(Request $request)
    {
        return $request->validate([
            'descripcion' => 'required|max:50',
            'calle' => 'required|max:50',
            'numero' => 'required|integer|max:99999',
            'localidad' => 'required|max:25',
            'departamento' => 'required|max:25',
            'telefono' => 'required|max:9',
            'empresa' => 'required',
            'cliente_ci' => 'required|exists:clientes,ci', 
        ]);
    }
    

    public function Insertar(Request $request)
    {
        $this->ValidarInsertar($request);
    
        $cliente = Clientes::where('ci', $request->input('cliente_ci'))->first();
    
        if (!$cliente) {
            return 'Cliente no encontrado'; 
        }
    
        $paquete = new Paquete;
        $paquete->descripcion = $request->input('descripcion');
        $paquete->calle = $request->input('calle');
        $paquete->numero = $request->input('numero');
        $paquete->localidad = $request->input('localidad');
        $paquete->departamento = $request->input('departamento');
        $paquete->telefono = $request->input('telefono');
        $paquete->estado = $request->input('estado');
        $paquete->tamaño = $request->input('tamaño');
        $paquete->peso = $request->input('peso');
        $paquete->fecha_creacion = $request->input('fecha_creacion');
        $paquete->hora_creacion = $request->input('hora_creacion');
        $paquete->empresa = $request->input('empresa');
        $paquete->cliente_ci = $request->input('cliente_ci');
        $email = $cliente->email;
       
    
        $identificadorUnico = $request->input('identificadorUnico');
        $codigoDeSeguimiento = $this->obtenerTracking($identificadorUnico);
        $paquete->codigo_seguimiento = $codigoDeSeguimiento;
        $paquete->save();
    
        if ($paquete->estado === 'En almacén destino') {
            $almacen = Almacen::where('departamento', $paquete->departamento)->first();
    
            if (!$almacen) {
                return 'No se encontró un almacén para el departamento del paquete';
            }
    
            $almacena = new Almacena;
            $almacena->id_paquete = $paquete->id;
            $almacena->id_almacen = $almacen->id;
            $almacena->save();
        }
    
        $resultado = $this->enviarCorreo( $email, $paquete->descripcion, $paquete->codigo_seguimiento, $paquete->estado);
    
        return 'Paquete insertado con éxito';
    }
    



public function guardarRelacion($id_empleado, $id_paquete)
{
    $creas = new Creas();
    $creas->id_func = $id_empleado;
    $creas->id_paquete = $id_paquete;
    $creas->save();
}


public function consolidar(Request $request)
{
    $camionId = $request->input('selectedCamion');
    $id_paquete = $request->input('selectedPackages');   
 
    $paquetesSeleccionados = json_decode($id_paquete, true)['Paquetes'];

    
    $loteModel = new Lote();
    $loteModel->camionId = $camionId;
    $loteModel->estado = 'Consolidado';
    $loteModel->save();

    $loteModel->paquetes()->attach($paquetesSeleccionados);


    Paquete::whereIn('id', $paquetesSeleccionados)->delete();

    return redirect()->back()->with('success', 'Paquetes consolidados correctamente y se eliminó la referencia en Paquete.');
}


public function listarPaquetes()
{
    $camiones = Camiones::all();
    $paquetes = Paquete::all(); 
    return view('paquetes.listar', compact('camiones', 'paquetes'));
}

public function obtenerTracking($identificadorUnico) {
    $fechaHoraActual = now();
    $año = $fechaHoraActual->year;
    $mes = str_pad($fechaHoraActual->month, 2, '0', STR_PAD_LEFT);
    $dia = str_pad($fechaHoraActual->day, 2, '0', STR_PAD_LEFT);
    $hora = str_pad($fechaHoraActual->hour, 2, '0', STR_PAD_LEFT);
    $minutos = str_pad($fechaHoraActual->minute, 2, '0', STR_PAD_LEFT);
    $segundos = str_pad($fechaHoraActual->second, 2, '0', STR_PAD_LEFT);
    
    $codigoDeSeguimiento = "TRACK_ADN2018" . $año . $mes . $dia . $hora . $minutos . $segundos . $identificadorUnico;

    return $codigoDeSeguimiento;
}


public function registro()
{
    $paquetes = Paquete::all();
    return view('paquetes.ingresados', ['paquetes' => $paquetes]);
}


public function Editar($id)
{
    $paquete = Paquete::find($id);
    return view('paquetes.Editar', ['paquete' => $paquete]);
}

public function Eliminar($id)
{    
    $paquete = Paquete::find($id);         
    $paquete->delete();      
}







public function Actualizar(Request $request, $paquete)



{

    $cliente = Clientes::where('ci', $request->input('cliente_ci'))->first();

    if (!$cliente) {
        return 'Cliente no encontrado'; 
    }

    try {
        $this->ValidarInsertar($request);

        $paquete = Paquete::find($paquete);

        if (!$paquete) {
            return 'Paquete no encontrado';
        }

        $paquete->descripcion = $request->input('descripcion');
        $paquete->calle = $request->input('calle');
        $paquete->numero = $request->input('numero');
        $paquete->localidad = $request->input('localidad');
        $paquete->departamento = $request->input('departamento');
        $paquete->telefono = $request->input('telefono');
        $paquete->estado = $request->input('estado');
        $paquete->tamaño = $request->input('tamaño');
        $paquete->peso = $request->input('peso');
        $paquete->fecha_creacion = $request->input('fecha_creacion');
        $paquete->hora_creacion = $request->input('hora_creacion');
        $paquete->cliente_ci = $request->input('cliente_ci'); 
        $email = $cliente->email; 
        $paquete->codigo_seguimiento;
        $paquete->save();


        if ($paquete->estado === 'En almacén destino') {
            $almacen = Almacen::where('departamento', $paquete->departamento)->first();
    
            if (!$almacen) {
                return 'No se encontró un almacén para el departamento del paquete';
            }
    
           
            $almacena = new Almacena;
            $almacena->id_paquete = $paquete->id;
            $almacena->id_almacen = $almacen->id;
            $almacena->save();
        }

        

        $resultado = $this->enviarCorreo( $email, $paquete->descripcion, $paquete->codigo_seguimiento, $paquete->estado);



        
        return 'Paquete actualizado con éxito';
    } catch (\Exception $e) {
        return 'Error al actualizar el paquete: ' . $e->getMessage();
    }
}

public function Estado(Request $request, $paquete)
{  
    $paquete = Paquete::find($paquete);       
    $paquete->estado = $request->input('estado');    
    $paquete->save();

    $cliente = Clientes::where('ci', $paquete->cliente_ci)->first();
    
    if (!$cliente) {
        return 'Cliente no encontrado';
    }

    $descripcion = $paquete->descripcion;
    $email = $cliente->email;
    $codigo_seguimiento = $paquete->codigo_seguimiento;

    $resultado = $this->enviarCorreo($email, $descripcion, $codigo_seguimiento, $paquete->estado);
}



public function mostrarPaquetes()
{
    $paquetes = Paquete::all();
    return view('paquetes.lista', compact('paquetes'));
}

public function paquetesEnAlmacenDestino()
{
    
    $paquetes = Paquete::where('estado', 'En almacén destino')->get();
        
    return view('paquetes.desconsolidar', ['paquetes' => $paquetes]);


}


public function enviarCorreo($correoDestino, $paquetedes, $paqueteTracking, $estado) {
    
    $nombreDestino = ''; 

    $datos = [
        'mensaje' => 'Su paquete ' . $paquetedes . ' se encuentra ' . '  ' . $estado . '  ' . $paqueteTracking . ' Agradecemos su preferencia.',
    ];
      
   
    if (!empty($correoDestino)) {
        Mail::send('correo.mensaje', $datos, function($message) use ($correoDestino, $nombreDestino) {
            $message->to($correoDestino, $nombreDestino)
                    ->subject('Su paquete ha sido ingresado al sistema');
        });

        return "Correo enviado a $correoDestino.";
    } else {
        return "No se pudo enviar el correo, la dirección de correo electrónico es nula o vacía.";
    }
}

public function enviarCorreoFletes($correoDestino) {
    
    $nombreDestino = 'Estimado Cliente'; 

    $datos = [
        'mensaje' => 'Su paquete se encuentra en reparto y en breve estara llegando a su domicilio',
    ];
      
   
    if (!empty($correoDestino)) {
        Mail::send('correo.mensaje', $datos, function($message) use ($correoDestino, $nombreDestino) {
            $message->to($correoDestino, $nombreDestino)
                    ->subject('Su paquete ha sido ingresado al sistema');
        });

        return "Correo enviado a $correoDestino.";
    } else {
        return "No se pudo enviar el correo, la dirección de correo electrónico es nula o vacía.";
    }
}






}