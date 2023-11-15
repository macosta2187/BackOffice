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
<div class="container text-center">
        <h1 class="my-5">Editar Vehículos</h1>
    </div>
<div class="container d-flex align-items-center justify-content-center">
 
    <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="matricula">Matrícula:</label>
            <input type="text" class="form-control" name="matricula" value="{{ $vehiculo->matricula }}" required maxlength="7">
        </div>

        <div class="form-group col-md-30">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" value="{{ $vehiculo->marca }}" required maxlength="20">
        </div>

        <div class="form-group col-md-30">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" name="modelo" value="{{ $vehiculo->modelo }}" required maxlength="20">
        </div>

        <div class="form-group col-md-30">
            <label for="peso_camion">Peso:</label>
            <input type="text" class="form-control" name="peso_camion" value="{{ $vehiculo->peso_camion }}" required>
        </div>

        <div class="form-group col-md-30">
            <label for="capacidad_camion">Capacidad:</label>
            <input type="text" class="form-control" name="capacidad_camion" value="{{ $vehiculo->capacidad_camion }}" required>
        </div>

        <div class="form-check form-switch mb-2">
    <input type="checkbox" name="op_camion" id="op_camion" value="1" class="form-check-input">
    <label class="form-check-label" for="op_camion">Camión</label>
</div>

<div class="form-check form-switch mb-2">
    <input type="checkbox" name="op_flete" id="op_flete" value="1" class="form-check-input">
    <label class="form-check-label" for="op_flete">Flete</label>
</div>

    

        <button type="submit" class="btn btn-success">Guardar cambios</button>
    </form>
</div>
<script>

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
