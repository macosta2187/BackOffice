<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulario de Ingreso de Empleados</h1>

        <form id="myForm" action="{{ route('empleados.Insertar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="25">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" maxlength="25">
            </div>

            <div class="form-group">
                <label for="ci">CI (de 8 dígitos):</label>
                <input type="text" class="form-control" id="ci" name="ci" required pattern="[0-9]{8}" maxlength="8" required minlength="8">
            </div>

            <div class="form-group">
                <label for="celular">Número de celular (de 9 dígitos):</label>
                <input type="text" class="form-control" id="celular" name="celular" required minlength="9" required maxlength="9">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico (máximo 50 caracteres):</label>
                <input type="email" class="form-control" id="email" name="email" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña (Debe tener 12 caracteres):</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required maxlength="12"  required minlength="12" autocomplete="current-password">

            </div>

            <div class="form-check">
    <input type="checkbox" name="op_almacen" id="op_almacen" value="1"> Funcionario de Almacén<br>
</div>

<div class="form-check">
    <input type="checkbox" name="op_chofer" id="op_chofer" value="1"> Chofer<br>
</div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <div id="message" class="mt-3"></div>

        <script>
            var token = localStorage.getItem('token');
            
            if (token) {
                var form = document.getElementById('myForm');
                form.action = "{{ route('empleados.Insertar') }}?token=" + token;
            }

          
            @if(session('message'))
                document.getElementById('message').innerHTML = '<div class="alert alert-success">{{ session('message') }}</div>';
            @elseif(session('error'))
                document.getElementById('message').innerHTML = '<div class="alert alert-danger">{{ session('error') }}</div>';
            @endif



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
    </div>
</body>
</html>

