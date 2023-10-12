<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Almacenes</title>
    <!-- Enlace al archivo de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace al archivo de DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Almacenes</h1>
        <table id="tabla-almacenes" class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th> 
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->nombre }}</td>
                        <td>{{ $almacen->calle }}</td>
                        <td>{{ $almacen->numero }}</td>
                        <td>{{ $almacen->localidad }}</td>
                        <td>{{ $almacen->departamento }}</td>
                        <td>{{ $almacen->telefono }}</td>
                        <td>
                            <a href="{{ route('almacenes.Editar', $almacen->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('almacenes.eliminar', $almacen->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Enlace al archivo de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Enlace al archivo de DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla-almacenes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" // Cambia al archivo de idioma correspondiente si es necesario
                }
            });
        });
    </script>
</body>
</html>

