<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
    <style>

    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Editar Vehículos</h1>
    <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="matricula">Matrícula:</label>
            <input type="text" class="form-control" name="matricula" value="{{ $vehiculo->matricula }}" required maxlength="7">
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" value="{{ $vehiculo->marca }}" required maxlength="20">
        </div>

        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" required maxlength="20">
        </div>

        <div class="form-group">
            <label for="peso_camion">Peso:</label>
            <input type="text" class="form-control" name="peso_camion" value="{{ $vehiculo->peso_camion }}" required>
        </div>

        <div class="form-group">
            <label for="capacidad_camion">Capacidad:</label>
            <input type="text" class="form-control" name="capacidad_camion" value="{{ $vehiculo->capacidad_camion }}" required>
        </div>

    

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>




</body>
</html>
