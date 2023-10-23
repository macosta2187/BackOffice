<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<header class="bg-custom-orange text-white">
    <div class="container">
        <h1 class="text-center">Paquetes Ingresados</h1>
    </div>
</header>

<div class="container mt-4">
    <div class="table-responsive text-center">
        <table class="table table-hover table-lg w-auto" id="paquetesTable">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <th>Fecha de Creación</th>
                    <th>Hora de Creación</th>
                    <th>Tracking</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($paquetes as $paquete)
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
                    <td>
                      
                        <a href="{{ route('paquetes.Editar', ['id' => $paquete->id]) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>                        
                        <button class="btn btn-danger">Borrar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#paquetesTable').DataTable({
            "language": {
                "url": "Spanish.json" 
            }
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>
</html>
