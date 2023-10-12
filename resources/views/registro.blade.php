<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Alta de Gestion Web</h1>
        <form id="myForm" action="{{ route('registrar') }}" method="POST">
            @csrf 

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" class="form-control" required>
            </div>

            <div class="form-check">
                <input type="checkbox" id="es_chofer" name="es_chofer" class="form-check-input" value="1" onchange="cambioestado(this)">
                <label class="form-check-label" for="es_chofer">¿Es un chofer?</label>
            </div>

            <div class="form-check">
                <input type="checkbox" id="es_almacen" name="es_almacen" class="form-check-input" value="1" onchange="cambioestado(this)">
                <label class="form-check-label" for="es_almacen">¿Es funcionario de almacén?</label>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script>
        function cambioestado(checkbox) {
            var es_chofer_checkbox = document.getElementById("es_chofer");
            var es_almacen_checkbox = document.getElementById("es_almacen");

            if (checkbox.id === "es_chofer" && checkbox.checked) {           
                es_almacen_checkbox.checked = false;
            } else if (checkbox.id === "es_almacen" && checkbox.checked) {          
                es_chofer_checkbox.checked = false;
            }
        }

        function postForm() {
            const form = document.getElementById('myForm');
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('Datos guardados correctamente');
                    } else {
                        alert('Error al enviar el formulario.');
                    }
                }
            };
            xhr.send(formData);
        }

        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();
            postForm(); 
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

