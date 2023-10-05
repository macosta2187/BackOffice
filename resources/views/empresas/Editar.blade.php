<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>

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
    <h1>Editar Empresa</h1>
    <form action="{{ route('empresas.Actualizar', $empresa->rut) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $empresa->nombre }}" required>

        <label for="calle">Calle:</label>
        <input type="text" name="calle" value="{{ $empresa->calle }}" required>

        <label for="numero">Número:</label>
        <input type="text" name="numero" value="{{ $empresa->numero }}" required>

        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad" value="{{ $empresa->localidad }}" required>

        <label for="departamento">Departamento:</label>
        <input type="text" name="departamento" value="{{ $empresa->departamento }}" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" value="{{ $empresa->telefono }}" required>

        <button type="submit">Guardar cambios</button>
    </form>
</div>
</body>
</html>
