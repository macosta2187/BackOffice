<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleados</title>    
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Editar Empleados</h1>
    <form action="{{ route('empleados.Actualizar', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ci">Cédula:</label>
            <input type="text" class="form-control" name="ci" value="{{ $empleado->ci }}" pattern="[0-9]{8}" required maxlength="8">
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
            <input type="email" class="form-control" name="email" value="{{ $empleado->email }}" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="celular">Número de celular:</label>
            <input type="tel" class="form-control" name="celular" value="{{ $empleado->celular }}" required>
        </div>

        <div class="form-group">
            <label for="fechanac">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fechanac" value="{{ $empleado->fechanac }}" max="2005-09-22" required>
        </div>

        <div class="form-group">
            <label>Selecciona una opción:</label><br>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="es_chofer_si" name="es_chofer" value="1" {{ $empleado->es_chofer == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="es_chofer_si">¿Es un chofer? Sí</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="es_chofer_no" name="es_chofer" value="0" {{ $empleado->es_chofer == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="es_chofer_no">¿Es un chofer? No</label>
            </div>
        </div>

        <div class="form-group">
            <label for="es_almacen">¿Es funcionario de almacén?</label><br>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="es_almacen_si" name="es_almacen" value="1" {{ $empleado->es_almacen == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="es_almacen_si">Sí</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="es_almacen_no" name="es_almacen" value="0" {{ $empleado->es_almacen == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="es_almacen_no">No</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
