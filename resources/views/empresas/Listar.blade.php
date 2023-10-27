<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empresas</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Lista de Empresas</h1>

 

        <table class="table table-striped">
            <thead>
                <tr>
                <th>id</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->RUT }}</td>
                        <td>{{ $empresa->nombre }}</td>
                        <td>{{ $empresa->calle }}</td>
                        <td>{{ $empresa->numero }}</td>
                        <td>{{ $empresa->localidad }}</td>
                        <td>{{ $empresa->departamento }}</td>
                        <td>{{ $empresa->telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
               <div class="mb-3">
            <a href="{{ route('empresas.Insertar') }}" class="btn btn-success">Insertar Empresa</a>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


