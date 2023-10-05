<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
	    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <style>

body {
    font-family: Arial, sans-serif;
    text-align: center;
    background-color: #F85C3D;
    padding: 20px;
}

h1 {
    color: #333;
	text-align: center;
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


input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
}


    </style>
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <form id="myForm" action="{{ route('registrar') }}" method="POST">
	 @csrf 
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <input type="submit" value="Registrar">
    </form>

    <script>
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
