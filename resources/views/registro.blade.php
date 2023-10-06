<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;           
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Alta de Gestion Web</h1>
    <form id="myForm" action="{{ route('registrar') }}" method="POST">
        @csrf 

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>

        <label>Selecciona Roles:</label><br>

        <div>
            <label for="es_chofer">¿Es un chofer?</label>
            <input type="checkbox" id="es_chofer" name="es_chofer" value="1"> Sí
        </div>

        <div>
            <label for="es_almacen">¿Es funcionario de almacén?</label>
            <input type="checkbox" id="es_almacen" name="es_almacen" value="1"> Sí
        </div>

        <input type="submit" value="Registrar">
    </form>

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
</body>
</html>
