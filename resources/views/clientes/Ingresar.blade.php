<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Formulario de Ingreso de Cliente</title>
</head>
<body>
<div class="container text-center">
        <h1 class="my-5">Alta de clientes en sistema</h1>
            <div class="col-12 d-flex justify-content-end align-items-start">
                <a href="{{ route('clientes.Listar')}}" class="btn btn-outline-info">Administracion</a>
            </div>
    </div>
    <div class="container d-flex align-items-center justify-content-center">
        
        <form id="myForm" action="{{ route('clientes.Ingresar') }}" method="POST">
            @csrf

            <div class="form-group col-md-30">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50">
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required maxlength="50">
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for = "ci">Cedula:</label>
                <input type="text" class="form-control" id="ci" name="ci" pattern="[0-9]{8}" required maxlength="8">
            </div>

            <div class="form-group col-md-30 mb-2">
                <label for = "direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required maxlength="50">
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
                <label for = "email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required maxlength="50">
            </div>
            
            <div class="form-group col-md-30 mb-2">
                <label for="telefono">Telefono:</label>
                <input type="text"  class="form-control" id="telefono" name="telefono"  pattern="[0-9]{9}" required maxlength="9">
            </div>


            <button type="submit" class="btn btn-success">Guardar</button>
            <td></td>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       
    </script>
</body>
</html>
