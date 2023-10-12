<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
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
            <input type="text" class="form-control" name="matricula" value="{{ $vehiculo->matricula }}" required>
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" value="{{ $vehiculo->marca }}" required>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" required>
        </div>

        <div class="form-group">
            <label for="peso">Peso:</label>
            <input type="text" class="form-control" name="peso" value="{{ $vehiculo->peso }}" required>
        </div>

        <div class="form-group">
            <label for="capacidad">Capacidad:</label>
            <input type="text" class="form-control" name="capacidad" value="{{ $vehiculo->capacidad }}" required>
        </div>

        <div class="form-group">
            <label for="id_chofer">ID Chofer:</label>
            <input type="text" class="form-control" name="id_chofer" value="{{ $vehiculo->id_chofer }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
