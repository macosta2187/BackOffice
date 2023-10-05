<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="numeric"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: bold;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>

<div class="container">
    <h1>Editar Empleados</h1>
    <form action="{{ route('empleados.Actualizar', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="ci">Cédula:</label>
        <input type="text" name="ci" value="{{ $empleado->ci }}" pattern="[0-9]{8}" required maxlength="8">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $empleado->nombre }}" maxlength="25" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="{{ $empleado->apellido }}" maxlength="25" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="{{ $empleado->email }}" maxlength="50" required>

        <label for="celular">Número de celular:</label>
        <input type="tel" name="celular" value="{{ $empleado->celular }}" required>

        <label for="fechanac">Fecha de Nacimiento:</label>
        <input type="date" name="fechanac" value="{{ $empleado->fechanac }}" max="2005-09-22" required>

        <label>Selecciona una opción:</label><br>

        <div>
            <label for="es_chofer">¿Es un chofer?</label>
            <input type="radio" id="es_chofer_si" name="es_chofer" value="1" {{ $empleado->es_chofer == 1 ? 'checked' : '' }}> Sí
            <input type="radio" id="es_chofer_no" name="es_chofer" value="0" {{ $empleado->es_chofer == 0 ? 'checked' : '' }}> No
        </div>

        <div>
            <label for="es_almacen">¿Es funcionario de almacén?</label>
            <input type="radio" id="es_almacen_si" name="es_almacen" value="1" {{ $empleado->es_almacen == 1 ? 'checked' : '' }}> Sí
            <input type="radio" id="es_almacen_no" name="es_almacen" value="0" {{ $empleado->es_almacen == 0 ? 'checked' : '' }}> No
        </div>

        <button type="submit">Guardar cambios</button>
    </form>
</div>
