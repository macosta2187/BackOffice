<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Aplicación de Almacén</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Aplicación de Almacén</h1>
        <h2 class="text-center">Paquetes cargados actualmente en el sistema</h2>
        <h2 class="text-center">Los camiones tienen un MÁXIMO de 1000 KG</h2>

        <div class="form-group">
            <label for="filtroDepartamento">Filtrar por Departamento:</label>
            <select class="form-control" id="filtroDepartamento">
                <option value="">Todos</option>
            </select>
        </div>

        <div class="form-group">
            <label for="filtroPeso">Filtrar por Peso:</label>
            <select class="form-control" id="filtroPeso">
                <option value="">Todos</option>
                <option value="1000">Menos de 1000 kg</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputLote">LOTE:</label>
            <input type="number" class="form-control" id="inputLote" placeholder="Ingrese el número de lote" min="1">
        </div>

        <div class="form-group">
            <label for="camionesSelect">Selecciona un camión:</label>
            <select class="form-control" id="camionesSelect">
                @foreach($camiones as $camion)
                    <option value="{{ $camion->id_camion }}">{{ $camion->id_camion }}</option>
                @endforeach
            </select>
        </div>

        <button id="btnConsolidarPaquetes" class="btn btn-primary">Consolidar Paquetes</button>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Numero de Paquete</th>
                    <th>descripcion</th>
                    <th>Calle</th>
                    <th>Número de puerta</th>
                    <th>Localidad</th>
                    <th>Departamento destino</th>
                    <th>Estatus</th>
                    <th>Tamaño del paquete</th>
                    <th>Peso (kg)</th>
                    <th>Teléfono contacto</th>
                    <th>Fecha de recepción</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody id="paquetesData">
                @foreach($paquetes as $paquete)
                    <tr>
                        <td>{{ $paquete->id }}</td>
                        <td>{{ $paquete->descripcion }}</td>
                        <td>{{ $paquete->calle }}</td>
                        <td>{{ $paquete->numero }}</td>
                        <td>{{ $paquete->localidad }}</td>
                        <td>{{ $paquete->departamento }}</td>
                        <td>{{ $paquete->estatus }}</td>
                        <td>{{ $paquete->tamaño }}</td>
                        <td>{{ $paquete->peso }}</td>
                        <td>{{ $paquete->telefono }}</td>
                        <td>{{ $paquete->fecha }}</td>
                        <td><input type="checkbox" class="form-check-input" name="seleccionarPaquete" value="{{ $paquete->id }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="sumaPesosLabel" class="text-center">Peso Total del envío en kg: 0.00 kg</div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function consolidarPaquetes() {
            const checkboxes = document.querySelectorAll('input[name="seleccionarPaquete"]:checked');
            const loteValue = parseInt(document.getElementById('inputLote').value);
            const camionSeleccionado = parseInt(document.getElementById('camionesSelect').value);

            if (isNaN(loteValue)) {
                alert("Ingresa un valor de lote válido.");
                return;
            }

            if (checkboxes.length === 0) {
                alert("Selecciona al menos un paquete para consolidar.");
                return;
            }

            const paquetesAConsolidar = Array.from(checkboxes).map(checkbox => {
                return {
                    paqueteId: parseInt(checkbox.value),
                    lote: loteValue,
                    estatus: "Consolidado",
                    camionId: camionSeleccionado
                };
            });

            const url = 'http://127.0.0.1:8000/api/crearLotes';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ Paquetes: paquetesAConsolidar }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else {
                    alert('Error al consolidar paquetes.');
                }
            })
            .catch(error => {
                console.error('Error al consolidar paquetes:', error);
            });
        }

        $(document).ready(function() {
            $('#btnConsolidarPaquetes').click(function() {
                consolidarPaquetes();
            });
        });
    </script>
</body>
</html>

