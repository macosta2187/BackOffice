<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CreasController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\LotePaqueteController;
use App\Http\Controllers\FletesController;
use App\Http\Controllers\DespachaController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\GraficoController;
use App\Models\Paquete;
use App\Models\LotePaquete;
use App\Models\Empresa;
use App\Models\Fletes;
use App\Models\Despacha;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Middleware\Autenticacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::view('/register', 'auth.register')->name('register');

Route::get('/inicio', function () {
    return view('/inicio');
})->middleware('auth');


Route::get('/almacenes/Listar', [AlmacenController::class, "Listar"])->name('almacenes.Listar')->middleware('auth');
Route::post('/almacenes/Ingresar', [AlmacenController::class, "Insertar"])->name('almacenes.Insertar')->middleware('auth');
Route::get('/almacenes/{almacen}/editar', [AlmacenController::class, "Editar"])->name('almacenes.Editar')->middleware('auth');
Route::put('/almacenes/{almacen}', [AlmacenController::class, "Actualizar"])->name('almacenes.Actualizar')->middleware('auth');
Route::delete('/almacenes/{almacen}', [AlmacenController::class, "Eliminar"])->name('almacenes.eliminar');


Route::get('/almacenes/Ingresar', function () {
    return view('almacenes/Ingresar');

})->middleware('auth');

Route::get('/almacenes/Eliminar', function () {
    return view('almacenes/Eliminar');
})->middleware('auth');

Route::get('/almacenes/Editar', function () {
    return view('almacenes/Editar');
})->middleware('auth');

Route::get('/empleados/Listar', [EmpleadoController::class, "Listar"])->name('empleados.Listar')->middleware('auth');
Route::post('/empleados/Ingresar', [EmpleadoController::class, "Insertar"])->name('empleados.Insertar')->middleware('auth');
Route::get('/empleados/{empleado}/editar', [EmpleadoController::class, "Editar"])->name('empleados.Editar')->middleware('auth');
Route::put('/empleados/{empleado}', [EmpleadoController::class, "Actualizar"])->name('empleados.Actualizar')->middleware('auth');
Route::delete('/empleados/{empleado}', [EmpleadoController::class, "Eliminar"])->name('empleados.eliminar')->middleware('auth');

Route::get('/empleados/Ingresar', function () {
    return view('empleados/Ingresar');
})->middleware('auth');

Route::get('/empleados/Eliminar', function () {
    return view('empleados/Eliminar');
})->middleware('auth');

Route::get('/empleados/Editar', function () {
    return view('empleados/Editar');
})->middleware('auth');

Route::get('/empleados/Actualizar', function () {
    return view('empleados/Actualizar');
})->middleware('auth');




Route::post('/vehiculos/Listar', [VehiculoController::class, "Listar"])->name('vehiculos.Listar')->middleware('auth');
Route::get('/vehiculos/Listar', [VehiculoController::class, "Listar"])->name('vehiculos.Listar')->middleware('auth');
Route::post('/vehiculos/Insertar', [VehiculoController::class, "Insertar"])->name('vehiculos.Insertar')->middleware('auth');


Route::get('/guardarRelacion/{id_empleado}/{id_paquete}', [PaqueteController::class, 'guardarRelacion'])->name('guardarRelacion');

Route::get('/vehiculos/Ingreso', [EmpleadoController::class, 'listarChoferes'])->middleware('auth');



Route::get('/vehiculos/Ingresar', [ChoferController::class, 'mostrarVistaIngresar'])->name('vehiculos.Insertar');


Route::get('/vehiculos/{vehiculo}/editar', [VehiculoController::class, "Editar"])->name('vehiculos.Editar')->middleware('auth');
Route::put('/vehiculos/{vehiculo}', [VehiculoController::class, "Actualizar"])->name('vehiculos.Actualizar')->middleware('auth');
Route::delete('/vehiculos/{id}', [VehiculoController::class, "Eliminar"])->name('vehiculos.eliminar')->middleware('auth');

Route::get('/vehiculos/Ingresar', function () {
    return view('vehiculos/Ingresar');
})->middleware('auth');

Route::get('/vehiculos/Eliminar', function () {
    return view('vehiculos/Eliminar');
})->middleware('auth');

Route::get('/vehiculos/Editar', function () {
    return view('vehiculos/Editar');
})->middleware('auth');

Route::get('/vehiculos/Actualizar', function () {
    return view('vehiculos/Actualizar');
})->middleware('auth');

Route::get('/productos/Listar', [ProductoController::class, "Listar"])->middleware('auth');
Route::post('/productos/Ingresar', [ProductoController::class, "Insertar"])->name('productos.Insertar')->middleware('auth');
Route::get('/productos/{producto}/editar', [ProductoController::class, "Editar"])->name('productos.Editar')->middleware('auth');
Route::put('/productos/{producto}', [ProductoController::class, "Actualizar"])->name('productos.Actualizar')->middleware('auth');
Route::delete('/productos/{producto}', [ProductoController::class, "Eliminar"])->name('productos.eliminar')->middleware('auth');

Route::get('/productos/Ingresar', function () {
    return view('productos/Ingresar');
})->middleware('auth');

Route::get('/productos/Eliminar', function () {
    return view('productos/Eliminar');
})->middleware('auth');

Route::get('/productos/Editar', function () {
    return view('productos/Editar');
})->middleware('auth');

Route::post('/paquetes/Ingresar', [PaqueteController::class, "Insertar"])->name('paquetes.Insertar')->middleware('auth');

Route::get('/paquetes/Ingresar', function () {
    return view('paquetes/Ingresar');
})->middleware('auth');


Route::get('/paquetes/{id}/Editar', [PaqueteController::class, "Editar"])->name('paquetes.Editar')->middleware('auth');
Route::put('/paquetes/{paquete}', [PaqueteController::class, "Actualizar"])->name('paquetes.Actualizar')->middleware('auth');
Route::delete('/paquetes/{paquete}', [PaqueteController::class, "Eliminar"])->name('paquetes.Eliminar')->middleware('auth');



Route::get('/paquetes/Ingresar', [EmpresaController::class, 'Empresa_paquetes'])->name('empresas.Ingresar')->middleware('auth');

Route::put('/paquetes/estado/{paquete}', [PaqueteController::class, "Estado"])->name('paquetes.Estado')->middleware('auth');

Route::get('/paquetes/Editar', function () {
    return view('paquetes/Editar');
})->middleware('auth');




Route::get('/paquetes/mostrarPaquetes', [PaqueteController::class, 'mostrarPaquetes'])->name('paquetes.mostrarPaquetes');
Route::get('/paquetes/Listar', [PaqueteController::class, 'listarPaquetes'])->name('paquetes.Listar');

Route::get('/paquetes/mostrar', [PaqueteController::class, 'mostrarPaquetes'])->name('paquetes.mostrar');



Route::post('/asignar-lote', [LoteController::class, "asignarLote"]);







Route::post('/IngresarLote', [LoteController::class, "ingresarLote"])->name('ingresarLote')->middleware('auth');

Route::get('/ListarLote', [LoteController::class, "ListarLote"])->middleware('auth');
Route::get('/EliminarLote/{id}', [LoteController::class, "EliminarLote"])->name('lote.eliminar')->middleware('auth');
Route::get('/EditarLote/{id}/editar', [LoteController::class, 'editarLote'])->name('lote.editar')->middleware('auth');
Route::post('/lote/{id}/actualizar', [LoteController::class, 'actualizarLote'])->name('lote.actualizar')->middleware('auth');


Route::post('/paquetes/consolidar', [PaqueteController::class, 'consolidar'])->name('paquetes.consolidar');


Route::get('/paquetes/desconsolidar', [PaqueteController::class, "paquetesEnAlmacenDestino"])->middleware('auth');


Route::get('/IngresarLote', function () {
    return view('IngresarLote');
})->middleware('auth');

Route::get('/IngresarLote', function () {
    return view('IngresarLote');
})->middleware('auth');


Route::get('/FormularioRlotes', function () {
    return view('/FormularioRlotes');
});

Route::get('/ingresados', function () {
    return view('/ingresados');
});

Route::post('/crearLotes', [LoteController::class, 'crearLotes'])->name('consolidar.paquetes');




Route::get('/error', function () {
    return view('error');
})->middleware('auth');






Route::get('/choferes/Ingresar', function () {
    return view('/choferes/Ingresar');
})->middleware('auth');



/*Empresa*/


Route::get('/empresas/Listar', [EmpresaController::class, 'Listar'])->name('empresas.Listar')->middleware('auth');
Route::post('/empresas/Ingresar', [EmpresaController::class, "Insertar"])->name('empresas.Insertar')->middleware('auth');
Route::get('/empresas/{rut}/editar', [EmpresaController::class, "Editar"])->name('empresas.Editar')->middleware('auth');

Route::put('/empresas/{empresas}', [EmpresaController::class, "Actualizar"])->name('empresas.Actualizar')->middleware('auth');
Route::delete('/empresas/{empresa}', [EmpresaController::class, 'Eliminar'])->name('empresas.Eliminar')->middleware('auth');


Route::get('/empresas/Listado', function () {
    return view('/empresas/Listado');
})->middleware('auth');

Route::get('/empresas/Ingresar', function () {
    return view('/empresas/Ingresar');
})->middleware('auth');






Route::get('/seguimiento', function () {
    return view('seguimiento');
})->middleware('auth');


Route::get('/LotePaquete', [LotePaqueteController::class, 'LotePaquete'])->middleware('auth');



Route::get('/lote-paquete', [LotePaqueteController::class, 'listarLotesPaquetes'])->middleware('auth');
Route::get('/fletes',[LotePaqueteController::class, 'listarFletes'])->middleware('auth');




Route::post('/enviar-paquete', [DespachaController::class, 'Insertar'])->name('enviarPaquete')->middleware('auth');



Route::get('/fletes', [FletesController::class, 'Listar'])->name('fletes.Listar');



Route::post('clientes/Ingresar', [ClientesController::class, 'Insertar'])->name('clientes.Ingresar');
Route::get('clientes/Listar', [ClientesController::class, 'Listar'])->name('clientes.Listar');
Route::delete('clientes/Eliminar/{id}', [ClientesController::class, 'Eliminar'])->name('clientes.Eliminar');
Route::put('clientes/Actualizar/{id}', [ClientesController::class, 'Actualizar'])->name('clientes.Actualizar');
Route::get('clientes/Editar/{id}', [ClientesController::class, 'Editar'])->name('clientes.Editar');


Route::get('/clientes/Ingresar', function () {
    return view('/clientes/Ingresar');
})->middleware('auth');


Route::get('/grafica', [PaqueteController::class, 'contarPaquetesConsolidados']);


Route::get('/mapa', function () {
    return view('/mapa');
})->middleware('auth')->name('mapa');