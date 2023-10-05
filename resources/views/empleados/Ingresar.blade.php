<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ingreso de Empleados</title>
    <link rel="stylesheet" type="text/css" href="/style_almacenes.css">
 
</head>
<body>
    <h1>Formulario de Ingreso de Empleados</h1>

    <form id="myForm" action="{{ route('empleados.Insertar') }}" method="POST">
     @csrf

        <label for="ci">CI:</label>
        <input type="numeric" id="ci" name="ci" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="celular">Número de celular:</label>
        <input type="text" id="celular" name="celular" required>       

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="fechanac">Fecha nacimiento:</label>
        <input type="date" id="fechanac" name="fechanac" required>

        <label>Selecciona una opción:</label><br>

        <label for="chofer">Es Chofer?</label>
        <input type="radio" id="chofer" name="opcion" value="chofer">

        <label for="emplAlmacen">Es funcionario de Almacen?</label>
        <input type="radio" id="emplAlmacen" name="opcion" value="emplAlmacen">

        <input type="submit" value="Guardar">
    </form>

    <script>
       
        var token = localStorage.getItem('token');

        
      


if (token) {
    var form = document.getElementById('myForm');
    form.action = "{{ route('empleados.Insertar') }}" + "?=" + token;
}

    </script>
</body>
</html>
