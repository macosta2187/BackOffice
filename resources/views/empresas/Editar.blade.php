<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    
    <!-- Incluye el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Editar Empresa</h1>
    <form action="{{ route('empresas.Actualizar', $empresa->rut) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{ $empresa->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" class="form-control" name="calle" value="{{ $empresa->calle }}" required>
        </div>

        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" class="form-control" name="numero" value="{{ $empresa->numero }}" required>
        </div>

        <div class="form-group">
            <label for="localidad">Localidad:</label>
            <input type="text" class="form-control" name="localidad" value="{{ $empresa->localidad }}" required>
        </div>

        <div class="form-group">
            <label for="departamento">Departamento:</label>
            <input type="text" class="form-control" name="departamento" value="{{ $empresa->departamento }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" name="telefono" value="{{ $empresa->telefono }}" required>
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
