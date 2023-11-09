<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Ingresados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">
    <h1>Historial de Paquetes consolidados en Sistema</h1>
    <table class="table table-striped" id="tabla-paquetes">
        <thead>

        <div style="text-align: center;">
    <img src="{{ asset('consolidar.jpg') }}" alt="Flete" width="200" height="150">
</div>

            <tr>
                <th>Lote ID</th>
                <th>Camión</th>
                <th>Paquetes</th>
                
            </tr>
        </thead>
        <tbody>
            @php
                $currentLoteId = null;
                $concatenatedPaquetes = '';
            @endphp

            @foreach ($lotesPaquetes as $lotePaquete)
                @if ($currentLoteId !== $lotePaquete->lote->id)
                    @if ($currentLoteId !== null)
                        <tr>
                            <td>{{ $currentLoteId }}</td>
                            <td>{{ $lotePaquete->lote->camionId }}</td>
                            <td>{{ $concatenatedPaquetes }}</td>
                        </tr>
                    @endif
                    @php
                        $currentLoteId = $lotePaquete->lote->id;
                        $concatenatedPaquetes = $lotePaquete->paquete_id;
                    @endphp
                @else
                    @php
                        $concatenatedPaquetes .= ', ' . $lotePaquete->paquete_id;
                    @endphp
                @endif
            @endforeach

            @if ($currentLoteId !== null)
                <tr>
                    <td>{{ $currentLoteId }}</td>
                    <td>{{ $lotePaquete->lote->camionId }}</td>
                    <td>{{ $concatenatedPaquetes }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla-paquetes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

    
</script>

</body>
</html>
