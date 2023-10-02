<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style_almacenes.css">
    <title>Formulario de Ingreso de Vehiculos</title>
    
</head>
<body>
    <h1>Formulario de Ingreso de Vehiculos</h1>

    <form id="myForm" action="{{ route('vehiculos.Insertar') }}" method="POST">
     @csrf

        <label for="matricula">matricula:</label>
        <input type="text" id="matricula" name="matricula" required>

        <label for="marca">marca:</label>
        <input type="text" id="marca" name="marca" required>

        <label for="modelo">modelo:</label>
        <input type="text" id="modelo" name="modelo" required>       

        <label for="peso">Peso</label>
        <input type="text" id="peso" name="peso">


        <label for="capacidad">Capacidad</label>
        <input type="text" id="capacidad" name="capacidad">

        <label for="id_chofer">id_chofer:</label>
        <input type="numeric" id="id_chofer" name="id_chofer">

        <input type="submit" value="Guardar">
    </form>
</body>
</html>

