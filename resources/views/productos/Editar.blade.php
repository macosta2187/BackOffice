<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

     /* Estilos para los labels */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Estilos para los inputs */
input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Estilos para el botón */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 3px;
    cursor: pointer;
    font-weight: bold;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Estilos para el contenedor del formulario */
.form-container {
    max-width: 400px;
    margin: 0 auto;
}
    </style>

</head>
<body>

<div class="container">
    <h1>Editar Prductos</h1>
    <form action="{{ route('productos.Actualizar', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" value="{{ $producto->descripcion }}" required>

        <label for="calle">Calle:</label>
        <input type="text" name="calle" value="{{ $producto->calle }}" required>

        <label for="numero">Número:</label>
        <input type="text" name="numero" value="{{ $producto->numero }}" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="{{ $producto->ciudad }}" required>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" value="{{ $producto->estado }}" required>

        <label for="id_lote">id_lote:</label>
        <input type="text" name="id_lote" value="{{ $producto->id_lote }}" required>
    

        <button type="submit">Guardar cambios</button>
    </form>
</div>

</body>
</html>