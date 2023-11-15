<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
    <title>Registro de Almacén</title>
</head>
<body>
    <div class="container text-center">
        <h1 class="my-5">Registro de almacén</h1>
        <div class="col-12 d-flex justify-content-end align-items-start">
    <a href="{{ route('almacenes.Listar')}}" class="btn btn-outline-info">Gestion Almacen</a>
            </div>
    </div>
    

    <div class="container d-flex align-items-center justify-content-center">
        

        <form id="myForm" action="{{ route('almacenes.Insertar') }}" method="POST">
            @csrf
            <div class="form-group col-md-30">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="25">
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" required maxlength="50">
            </div>

            <div class="form-group col-md-30 mb-2">
    <label for="numero">Número:</label>
    <input type="text" class="form-control" id="numero" name="numero" required maxlength="6">
</div>


            <div class="form-group col-md-30 mb-2">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" required maxlength="50">
            </div>

            <div class="form-group col-md-30 mb-2">
    <label for="departamento">Departamento:</label>
    <select class="form-control" id="departamento" name="departamento" required>
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
</div>


<div class="form-group col-md-30 mb-2">
    <label for="telefono">Número de telefono (de 9 digitos)</label>
    <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{9}" required maxlength="9">
</div>

<div class="form-group col-md-30 mb-2">
    <label for="latitud">Latitud</label>
    <input type="text" class="form-control" id="latitud" name="latitud" maxlength="8" required minlength="8">
</div>


<div class="form-group col-md-30 mb-2">
    <label for="longitud">Longitud</label>
    <input type="text" class="form-control" id="longitud" name="longitud" maxlength="8" required minlength="8">
</div>


            <button type="submit" class="btn btn-success">Guardar</button>
            
        </form>
    </div>

</body>
</html>

