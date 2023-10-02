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
    <h1>Editar Vehiculos</h1>
    <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="matricula">matricula:</label>
        <input type="text" name="matricula" value="{{ $vehiculo->matricula }}" required>

        <label for="marca">marca:</label>
        <input type="text" name="marca" value="{{ $vehiculo->marca }}" required>

        <label for="modelo">modelo:</label>
        <input type="text" name="modelo" value="{{ $vehiculo->modelo }}" required>

        <label for="peso">Peso:</label>
        <input type="text" name="peso" value="{{ $vehiculo->peso }}" required>

        <label for="capacidad">Capacidad:</label>
        <input type="text" name="capacidad" value="{{ $vehiculo->capacidad }}" required>

        <label for="id_chofer">id_chofer:</label>
        <input type="numeric" name="id_chofer" value="{{ $vehiculo->id_chofer }}" required>    

        <button type="submit">Guardar cambios</button>
    </form>
</div>

</body>
</html>