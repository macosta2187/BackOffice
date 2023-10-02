<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style_almacenes.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Registro de Almacén</title>
</head>
<body>
    <h1>Registro de almacen</h1>

    <form id="myForm" action="{{ route('almacenes.Insertar') }}" method="POST">
     @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" required>

        <label for="numero">Numero:</label>
        <input type="text" id="numero" name="numero" required>

        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" required>

<label for="departamento">Departamento:</label>
<select id="departamento" name="departamento" required>
  <option value="Artigas">Artigas</option>
  <option value="Canelones">Canelones</option>
  <option value="Cerro Largo">Cerro Largo</option>
  <option value="Colonia">Colonia</option>
  <option value="Durazno">Durazno</option>
  <option value="Flores">Flores</option>
  <option value="Florida">Florida</option>
  <option value="Lavalleja">Lavalleja</option>
  <option value="Maldonado">Maldonado</option>
  <option value="Montevideo">Montevideo</option>
  <option value="Paysandú">Paysandú</option>
  <option value="Río Negro">Río Negro</option>
  <option value="Rivera">Rivera</option>
  <option value="Rocha">Rocha</option>
  <option value="Salto">Salto</option>
  <option value="San José">San José</option>
  <option value="Soriano">Soriano</option>
  <option value="Tacuarembó">Tacuarembó</option>
  <option value="Treinta y Tres">Treinta y Tres</option>
</select>

        <label for="telefono">telefono:</label>
        <input type="tel" id="telefono" name="telefono" required>
		
		

        <input type="submit" value="Guardar">
    </form>



</body>
</html>
