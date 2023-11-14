<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Almacén</title>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center">
        <h1 class="my-5">Editar Almacen</h1>
    </div>

<div class="container d-flex align-items-center justify-content-center">
    
    <form action="{{ route('almacenes.Actualizar', $almacen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $almacen->nombre }}" required maxlength="50">
        </div>

        <div class="form-group col-md-30">
            <label for="calle">Calle:</label>
            <input type="text" class="form-control" id="calle" name="calle" value="{{ $almacen->calle }}" required maxlength="50">
        </div>

        <div class="form-group col-md-30">
    <label for="numero">Número:</label>
    <input type="text" class="form-control" id="numero" name="numero" value="{{ $almacen->numero }}" required maxlength="6">
</div>

        <div class="form-group col-md-30">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $almacen->localidad }}" required maxlength="50">
            </div>

        <div class="form-group col-md-30">
            <label for="departamento">Departamento:</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $almacen->departamento }}"  maxlength="50">
        </div>

        <div class="form-group col-md-30">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $almacen->telefono }}" required maxlength="9">
        </div>


        <div class="form-group col-md-30">
            <label for="latitud">Latitud:</label>
            <input type="text" class="form-control" id="latitud" name="latitud" value="{{ $almacen->latitud }}" required maxlength="8">
        </div>


        <div class="form-group col-md-30">
            <label for="longitud">Longitud:</label>
            <input type="text" class="form-control" id="longitud" name="longitud" value="{{ $almacen->longitud }}" required maxlength="8">
        </div>


        <button type="submit" class="btn btn-success">Guardar cambios</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
