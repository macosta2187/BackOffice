<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Almacén</title>
    
    <!-- Incluye el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Editar Almacén</h1>
    <form action="{{ route('almacenes.Actualizar', $almacen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $almacen->nombre }}" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" class="form-control" id="calle" name="calle" value="{{ $almacen->calle }}" required maxlength="50">
        </div>

        <div class="form-group">
    <label for="numero">Número:</label>
    <input type="text" class="form-control" id="numero" name="numero" value="{{ $almacen->numero }}" required maxlength="6">
</div>

        <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $almacen->localidad }}" required maxlength="50">
            </div>

        <div class="form-group">
            <label for="departamento">Departamento:</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $almacen->departamento }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $almacen->telefono }}" required maxlength="9">
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

<!-- Incluye los scripts de Bootstrap y jQuery al final del documento -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
