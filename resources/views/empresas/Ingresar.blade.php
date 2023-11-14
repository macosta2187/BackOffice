<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Formulario de Empresa</title>
</head>
<body>
<div class="container text-center">
        <h1 class="my-5">Alta de Empresa</h1>
        <div class="col-12 d-flex justify-content-end align-items-start">
        <a href="{{ route('empresas.Listar')}}" class="btn btn-outline-info">Gestion</a>
            </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center">
        

        <form action="{{ route('empresas.Insertar') }}" method="post">
            @csrf
            <div class="form-group col-md-30">
                <label for="RUT">RUT:</label>
                <input type="text" class="form-control" id="RUT" name="RUT" maxlength="12" required>
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="25" required>
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" maxlength="50" required>
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="numero">Número:</label>
                <input type="number" class="form-control" id="numero" name="numero" maxlength="5" required>
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" maxlength="25" required>
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
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="9" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            
            <td></td>
        </form>
    </div>
</body>
</html>

