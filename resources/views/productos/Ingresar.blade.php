<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style_almacenes.css">
    <title>Registro de Pre-Envio</title>
</head>
<body>
    <h1>Registro de Pre-Envio</h1>

    <form id="myForm" action="{{ route('productos.Insertar') }}" method="POST">
        @csrf
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required>

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" required>

        <label for="numero">Numero:</label>
        <input type="text" id="numero" name="numero" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>

       <label for="estado">Estado:</label>
       <select id="estado" name="estado" required>
       <option value="Transito">Transito</option>
       <option value="Entregado">Entregado</option>
       <option value="Admitido">Admitido</option>
      </select>    

       <label for="id_lote">id_lote:</label>
       <input type="text" id="id_lote" name="id_lote" required>

       <input type="submit" value="Guardar">
    </form>

</body>
</html>
