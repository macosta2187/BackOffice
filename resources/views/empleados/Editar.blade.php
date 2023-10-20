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

<div class="container mt-4">
    <h1 class="text-center">Editar Empleados</h1>
    <form action="{{ route('empleados.Actualizar', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
    <label for="ci">Cédula:</label>
    <input type="text" class="form-control" name="ci" value="{{ $empleado->ci }}" pattern="[0-9]{8}" required maxlength="8" readonly>
</div>


        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{ $empleado->nombre }}" maxlength="25" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" name="apellido" value="{{ $empleado->apellido }}" maxlength="25" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="text" class="form-control" name="email" value="{{ $empleado->email }}" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="celular">Número de celular:</label>
            <input type="tel" class="form-control" name="celular" value="{{ $empleado->celular }}" required>
        </div>

        <div class="form-group">
    <label for="contraseña">
        Contraseña (Debe tener 12 caracteres):
    </label>
    <input type="password" class="form-control" id="contraseña" name="contraseña" required maxlength="12" value="{{ $empleado->contraseña }}">
</div>


        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

</body>
</html>
