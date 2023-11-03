<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes en Almacén Destino</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Incluir DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
</head>
<body>
<div class="container">
    <h1>Paquetes en Almacén Destino</h1>
    <h1>Al seleccionar los paquetes estos viajan a su destino final</h1>
    <div style="text-align: center;">
    <img src="{{ asset('flete.jpg') }}" alt="Flete" width="200" height="150">
</div>
<table class="table table-striped" id="tabla-paquetes"  style="width: 100%;">
    <thead>
        <tr>
            <th>Seleccionar</th>
            <th>id</th>
            <th>Telefono</th>
            <th>Descripcion</th>
            <th>Calle</th>
            <th>Numero</th>
            <th>Localidad</th>
            <th>Departamento</th>
            <th>Tracking</th>
            <th>Fecha de Alta</th>
            <th>Estado</th>
            <th>Fletes disponibles:</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paquetes as $paquete)
            <tr>
                <td>
                    <input type="checkbox" name="seleccionar_paquete[]" value="{{ $paquete->id }}">
                </td>
                <td>{{ $paquete->id }}</td>
                <td>{{ $paquete->telefono}}</td>
                <td>{{ $paquete->descripcion}}</td>
                <td>{{ $paquete->calle}}</td> 
                <td>{{ $paquete->numero}}</td>
                <td>{{ $paquete->localidad}}</td>
                <td>{{ $paquete->departamento}}</td>                 
                <td>{{ $paquete->codigo_seguimiento }}</td>
                <td>{{ $paquete->fecha_creacion }}</td>
                <td>{{ $paquete->estado }}</td>
                <td>
                    <select class="form-control" name="flete_id">
                        @foreach ($fletes as $flete)
                            <option value="{{ $flete->id }}" {{ $paquete->flete_id == $flete->id ? 'selected' : '' }}>
                                {{ $flete->nombre }} (Flete: {{ $flete->id_flete }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 
    <!-- Incluir DataTables Buttons JS -->
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

