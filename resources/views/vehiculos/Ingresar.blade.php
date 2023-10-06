<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Formulario de Ingreso de Vehiculos</title>
    
</head>

    <!-- Incluye el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;           
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
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
        <input type="text" id="peso" name="peso" required> 


        <label for="capacidad">Capacidad</label>
        <input type="text" id="capacidad" name="capacidad" required> 

        <label for="id_chofer">Chofer:</label>
<select id="id_chofer" name="id_chofer" required>
    <option value="">Selecciona un chofer</option>
    @foreach($choferes as $chofer)
        <option value="{{ $chofer->id }}">{{ $chofer->nombre }} {{ $chofer->apellido }}</option>
    @endforeach
</select>
       

        <input type="submit" value="Guardar">
    </form>
</body>
</html>

