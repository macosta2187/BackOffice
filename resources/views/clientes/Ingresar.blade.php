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
    <div class="container mt-5">
        <h1 class="text-center">Alta de Clientes en Sistema</h1>
        <form id="myForm" action="{{ route('clientes.Ingresar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required maxlength="50">
            </div>

            <div class="form-group">
                <label for = "ci">Cedula:</label>
                <input type="text" class="form-control" id="ci" name="ci" required maxlength="9">
            </div>

            <div class="form-group">
                <label for = "direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required maxlength="50">
            </div>

            <div class="form-group">
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


             <div class="form-group">
                <label for = "email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text"  class="form-control" id="telefono" name="telefono"  required maxlength="9">
            </div>


            <button type="submit" class="btn btn-primary">Guardar</button>
            <td><a href="{{ route('clientes.Listar')}}" class="btn btn-primary">Administracion</a></td>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       
    </script>
</body>
</html>
