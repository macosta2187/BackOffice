<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
<body>
<div class="container d-flex align-items-center justify-content-center">
        <h1 class="mt-5 mb-5 text-center">Lista de empleados </h1>
</div>
    <div class="container ">
        
        <div class=".table-responsive">
        <table class="table table-hover">
                <thead class="table-info">
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Celular</th>
                        <th>Email</th>                                      
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
                            <td><a href="{{ route('empleados.Editar', $empleado->id) }}" class="btn btn-secondary">Editar</a></td>
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
                            <td colspan="7">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <td><a href="{{ route('empleados.Insertar')}}" class="btn btn-secondary">Ingreso empleados</a></td>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "language": {
                    "url": "Spanish.json" 
                },
                dom: 'Bfrtip',
                buttons: ['excel']
            });
        });
    </script>
</body>
</html>
