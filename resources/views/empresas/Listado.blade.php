<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empresas</title>
    
    <!-- Agrega tus estilos CSS aquí si es necesario -->

</head>
<body>
    <h1>Lista de Empresas</h1>

    <table>
        <thead>
            <tr>
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
                    <td>{{ $empresa->rut }}</td>
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

   

</body>
</html>
