<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style_almacenes.css">
    <title>Formulario de Empresa</title>
</head>
<body>
    <h1>Alta de Empresa</h1>
    
    <form action="{{ route('empresas.Insertar') }}" method="post">
    @csrf
        <label for="rut">RUT:</label>
        <input type="number" id="rut" name="rut" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" required><br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required><br><br>

        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" required><br><br>

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
</select><br><br>


        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
