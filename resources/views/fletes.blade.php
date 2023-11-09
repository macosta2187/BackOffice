<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes en Almacén Destino</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
</head>
<body>
<div class="container">
    <h1>Paquetes en Almacén Destino</h1>
    <h1>Al seleccionar los paquetes, estos viajan a su destino final</h1>
    <div style="text-align: center;">
        <img src="{{ asset('flete.jpg') }}" alt="Flete" width="200" height="150">
    </div>
    <table class="table table-striped" id="tabla-paquetes" style="width: 100%;">
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
                    <input type="radio" name="seleccionar_paquete" value="{{ $paquete->id }}">
                    </td>
                    <td>{{ $paquete->id }}</td>
                    <td>{{ $paquete->telefono }}</td>
                    <td>{{ $paquete->descripcion }}</td>
                    <td>{{ $paquete->calle }}</td>
                    <td>{{ $paquete->numero }}</td>
                    <td>{{ $paquete->localidad }}</td>
                    <td>{{ $paquete->departamento }}</td>
                    <td>{{ $paquete->codigo_seguimiento }}</td>
                    <td>{{ $paquete->fecha_creacion }}</td>
                    <td>{{ $paquete->estado }}</td>
                    <td>
                        <ul>
                            <label for="selectedFlete">Fletes:</label>
                            <select class="form-control col-6" id="selectedFlete" name="selectedFlete" required>
                                @foreach ($fletes as $flete)
                                    <option value="{{ $flete->id_flete }}">{{ $flete->id_flete }}</option>
                                @endforeach
                            </select>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <form method="POST" action="{{ route('enviarPaquete') }}" id="enviarPaqueteForm">
        @csrf
        <input type="hidden" name="id_flete" id="idFlete" value="">      
        <input type="hidden" name="paquete_id" value="{{ isset($paquete) ? $paquete->id : '' }}">
        <input type="hidden" name="departamento_paquete" value="{{ isset($paquete) ? $paquete->departamento : '' }}">
        <button type="submit" class="btn btn-primary">Enviar Paquete</button>
    </form>
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

document.getElementById('enviarPaqueteForm').addEventListener('submit', function(e) {
    e.preventDefault();  
    var selectedFlete = document.getElementById('selectedFlete').value;
    document.getElementById('idFlete').value = selectedFlete;
    var selectedPaquete = document.querySelector('input[name="seleccionar_paquete"]:checked');
    if (selectedPaquete) {
        document.querySelector('input[name="paquete_id"]').value = selectedPaquete.value;
        this.submit();  
    } else {
        alert('Por favor, selecciona un paquete antes de enviar.');
    }
});




</script>
</body>
</html>
