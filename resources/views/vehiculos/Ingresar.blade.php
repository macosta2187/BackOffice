<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Formulario de Ingreso de Vehículos</title>
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
                <label for "modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required maxlength="20">
            </div>

            <div class="form-group">
                <label for="peso_camion">Peso:</label>
                <input type="number" step="0.01" class="form-control" id="peso_camion" name="peso_camion" required>
            </div>

            <div class="form-group">
                <label for="capacidad_camion">Capacidad:</label>
                <input type="number" step="0.01" class="form-control" id="capacidad_camion" name="capacidad_camion" required>
            </div>

            <div class="form-check">
    <input type="checkbox" name="op_camion" id="op_camion" value="1"> Camión
</div>

<div class="form-check">
    <input type="checkbox" name="op_flete" id="op_flete" value="1"> Flete
</div>


            <button type="submit" class="btn btn-primary">Guardar</button>
            <td><a href="{{ route('vehiculos.Listar') }}" class="btn btn-primary">Gestión de Vehículos</a></td>
        </form>
    </div>

    <script>
        @if(session('message'))
            document.getElementById('message').innerHTML = '<div class="alert alert-success">{{ session('message') }}</div>';
        @elseif(session('error'))
            document.getElementById('message').innerHTML = '<div class="alert alert-danger">{{ session('error') }}</div>';
        @endif

        const checkboxCamion = document.getElementById("op_camion");
        const checkboxFlete = document.getElementById("op_flete");

        checkboxCamion.addEventListener("change", function() {
            if (checkboxCamion.checked) {
                checkboxFlete.disabled = true;
            } else {
                checkboxFlete.disabled = false;
            }
        });

        checkboxFlete.addEventListener("change", function() {
            if (checkboxFlete.checked) {
                checkboxCamion.disabled = true;
            } else {
                checkboxCamion.disabled = false;
            }
        });
    </script>
</body>
</html>
