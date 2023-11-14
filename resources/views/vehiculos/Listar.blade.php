<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de vehículos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css">

</head>
<body>
<div class="container text-center">
        <h1 class="my-5">Listar Vehiculos</h1>
            <div class="col-12 d-flex justify-content-end align-items-start">
                <a href="{{ route('vehiculos.Insertar')}}" class="btn btn-secondary">Ingresar vehiculo</a>
            </div>
    </div>

    <div class="container">
        
        <div class="table-responsive">
        <table class="table" id="vehiculos-table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Peso</th> 
                    <th>Capacidad</th>
                    <th>Camión</th>
                    <th>Flete</th>              
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->matricula }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->peso_camion }}</td>
                        <td>{{ $vehiculo->capacidad_camion }}</td>
                        <td>
                            @if($vehiculo->op_camion == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            @if($vehiculo->op_flete == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('vehiculos.Editar', $vehiculo->id) }}" class="btn btn-secondary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr id="no-results-row">
                        <td colspan="8">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        
        
       
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.flash.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#vehiculos-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });

            
            $('#exportar-excel').on('click', function() {
                table.button('.buttons-excel').trigger();
            });
        });
    </script>
</body>
</html>


