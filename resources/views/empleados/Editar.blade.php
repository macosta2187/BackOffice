<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center">
        <h1 class="mt-5 mb-5 text-center">Editar Empleados</h1>
</div>
<div class="container d-flex align-items-center justify-content-center">
    
    <form action="{{ route('empleados.Actualizar', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row mb-2">
            <label for="ci">Cédula:</label>
            <input type="text" class="form-control" name="ci" value="{{ $empleado->ci }}" pattern="[0-9]{8}" required maxlength="8" readonly>
        </div>


        <div class="form-group col-md-30">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{ $empleado->nombre }}" maxlength="25" required>
        </div>

        <div class="form-group col-md-30 mb-2">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="apellido" value="{{ $empleado->apellido }}" maxlength="25" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="text" class="form-control" name="email" value="{{ $empleado->email }}" maxlength="50" required>
        </div>

        <div class="form-group mb-2">
            <label for="celular">Número de celular:</label>
            <input type="tel" class="form-control" name="celular" value="{{ $empleado->celular }}" maxlength="9" required minlength="9">
        </div>

        <div class="form- mb-2">
            <label for="contraseña">
                Contraseña (Debe tener 12 caracteres):
            </label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required maxlength="12" value="{{ $empleado->contraseña }}">
        </div>

        <div class="form-check form-switch mb-2">
            <input type="checkbox" name="op_almacen" id="op_almacen" value="1" class="form-check-input">
            <label class="form-check-label" for="op_almacen">Funcionario de Almacén</label>
        </div>

        <div class="form-check form-switch mb-2">
            <input type="checkbox" name="op_chofer" id="op_chofer" value="1" class="form-check-input">
        <label class="form-check-label" for="op_chofer">Chofer</label>
        </div>

        


        <button type="submit" class="btn btn-success">Guardar cambios</button>
    </form>
</div>


<script>
    const checkboxAlmacen = document.getElementById("op_almacen");
    const checkboxChofer = document.getElementById("op_chofer");

    checkboxAlmacen.addEventListener("change", function() {
        if (checkboxAlmacen.checked) {
            checkboxChofer.disabled = true;
        } else {
            checkboxChofer.disabled = false;
        }
    });

    checkboxChofer.addEventListener("change", function() {
        if (checkboxChofer.checked) {
            checkboxAlmacen.disabled = true;
        } else {
            checkboxAlmacen.disabled = false;
        }
    });
</script>







</body>
</html>
