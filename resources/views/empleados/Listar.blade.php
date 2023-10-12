<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de empleados</h1>
        <table class="table table-bordered table-striped dataTable">
            <thead class="thead-dark">
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Fecha de nacimiento</th>
                    <th>Funcionario de Almacén</th>
                    <th>Funcionario Chofer</th>                                       
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->ci }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->celular }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->fechanac }}</td>
                        <td>{{ $empleado->es_almacen ? 'Sí' : 'No' }}</td>
                        <td>{{ $empleado->es_chofer ? 'Sí' : 'No' }}</td>
                        <td><a href="{{ route('empleados.Editar', $empleado->id) }}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="{{ route('empleados.eliminar', $empleado->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr id="no-results-row">
                        <td colspan="10">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
   
    <script src="query-3.6.0.min.js"></script>
   
    <script src="jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "language": {
                    "url": "Spanish.json" 
                }
            });
        });
    </script>
</body>
</html>

