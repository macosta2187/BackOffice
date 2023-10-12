<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ingreso de Empleados</title>
      <link rel="stylesheet" href="stylesm.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulario de Ingreso de Empleados</h1>

        <form id="myForm" action="{{ route('empleados.Insertar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="numeric" class="form-control" id="ci" name="ci" required pattern="[0-9]{8}" maxlength="8">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="celular">Número de celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fechanac">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fechanac" name="fechanac" required>
            </div>

            <div class="form-group">
                <label>Selecciona Roles:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="es_chofer" name="es_chofer" value="1">
                    <label class="form-check-label" for="es_chofer">¿Es un chofer?</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="es_almacen" name="es_almacen" value="1">
                    <label class="form-check-label" for="es_almacen">¿Es funcionario de almacén?</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    var token = localStorage.getItem('token');

    if (token) {
        var form = document.getElementById('myForm');
        form.action = "{{ route('empleados.Insertar') }}?token=" + token;
    }
</script>

</body>
</html>

