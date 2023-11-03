<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Ingresados</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/jquery.dataTables.css') }}">
    
    <!-- Agregar el CSS de DataTables Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Paquetes que ya se encuentran en Almacén Destino</h1>
        <table class="table table-striped" id="tabla-paquetes">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th>
                    <th>Estado Actual</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <th>Fecha de Creación</th>
                    <th>Hora de Creación</th>
                    <th>Código de Seguimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paquetes as $paquete)
                    @if ($paquete->estado == 'En almacén destino')
                        <tr>
                            <td>{{ $paquete->id }}</td>
                            <td>{{ $paquete->descripcion }}</td>
                            <td>{{ $paquete->calle }}</td>
                            <td>{{ $paquete->numero }}</td>
                            <td>{{ $paquete->localidad }}</td>
                            <td>{{ $paquete->departamento }}</td>
                            <td>{{ $paquete->telefono }}</td>
                            <td>{{ $paquete->estado }}</td>
                            <td>{{ $paquete->tamaño }}</td>
                            <td>{{ $paquete->peso }}</td>
                            <td>{{ $paquete->fecha_creacion }}</td>
                            <td>{{ $paquete->hora_creacion }}</td>
                            <td>{{ $paquete->codigo_seguimiento }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
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
            var table = $('#tabla-paquetes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>
</body>
</html>
