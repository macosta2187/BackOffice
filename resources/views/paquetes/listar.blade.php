<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Aplicación de Almacén</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F85C3D;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        td button {
            background-color: #333;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #555;
        }

        /* Estilos para el elemento de selección (select) */
        select {
            padding: 5px;
            margin: 10px;
            font-size: 16px;
        }

        /* Estilos para la etiqueta del elemento de selección */
        label {
            font-size: 18px;
            color: #FFFFFF;
        }

        #sumaPesosLabel {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Aplicación de Almacén</h1>
    <h1>Paquetes cargados actualmente en el sistema</h1>
    <h1>Los camiones tienen un MÁXIMO de 1000 KG</h1>

    <label for="filtroDepartamento">Filtrar por Departamento:</label>
    <select id="filtroDepartamento">
        <option value="">Todos</option>
        <!-- Opciones para departamentos aquí -->
    </select>

    <label for="filtroPeso">Filtrar por Peso:</label>
    <select id="filtroPeso">
        <option value="">Todos</option>
        <option value="1000">Menos de 1000 kg</option>
    </select>

    <label for="inputLote">LOTE:</label>
    <input type="number" id="inputLote" placeholder="Ingrese el número de lote" min="1">

    <label for="camionesSelect">Selecciona un camión:</label>
    <select id="camionesSelect">
        @foreach($camiones as $camion)
            <option value="{{ $camion->id_camion }}">{{ $camion->id_camion }}</option>
        @endforeach
    </select>

    <button id="btnConsolidarPaquetes">Consolidar Paquetes</button>

    <table>
        <thead>
            <tr>
                <th>Numero de Paquete</th>
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
                    <td>{{ $paquete->calle }}</td>
                    <td>{{ $paquete->numero }}</td>
                    <td>{{ $paquete->localidad }}</td>
                    <td>{{ $paquete->departamento }}</td>
                    <td>{{ $paquete->estatus }}</td>
                    <td>{{ $paquete->tamaño }}</td>
                    <td>{{ $paquete->peso }}</td>
                    <td>{{ $paquete->telefono }}</td>
                    <td>{{ $paquete->fecha }}</td>
                    <td><input type="checkbox" name="seleccionarPaquete" value="{{ $paquete->id }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="sumaPesosLabel">Peso Total del envío en kg: 0.00 kg</div>

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
                    cargarPaquetes(); 
                } else {
                    alert('Error al consolidar paquetes.');
                }
            })
            .catch(error => {
                console.error('Error al consolidar paquetes:', error);
            });
        }

        function cargarPaquetes() {
    
        }

        $(document).ready(function() {
            $('#btnConsolidarPaquetes').click(function() {
                consolidarPaquetes();
            });
        });
    </script>

    <button id="cerrarSesion">Cerrar sesión</button>
</body>
</html>
