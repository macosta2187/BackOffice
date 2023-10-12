<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ingreso de Vehículos</title>

    <!-- Incluye el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulario de Ingreso de Vehículos</h1>
        <form id="myForm" action="{{ route('vehiculos.Insertar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required maxlength="7">
            </div>

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" required maxlength="20">
            </div>

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required maxlength="20">
            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" step="0.01" class="form-control" id="capacidad" name="capacidad" required>
            </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery al final del documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


