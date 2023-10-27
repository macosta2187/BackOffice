<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidar</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/jquery.dataTables.css') }}">
</head>
<body>

<script src="{{ asset('bootstrap/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.dataTables.js') }}"></script>
    <style>
        .bg-custom-orange {
            background-color: #e16b16fb;
        }

        .table-hover tbody tr:hover {
            background-color: #e16b16fb;
        }
    </style>
</head>

<body>
<header class="bg-custom-orange text-white">
    <div class="container">
        <h1 class="text-center">Aplicación de Almacén</h1>
    </div>
</header>

@csrf

<div class="container text-center">
    <div class="row">
        <div class="col-md-4 mx-auto mb-3">
            <div class="form-group">
                <label for="filtroDepartamento">Filtrar por Departamento:</label>
                <select id="filtroDepartamento" class="form-control">
                    <option value="">Todos</option>
                    <option value="Artigas">Artigas</option>
                    <!-- Agrega otras opciones aquí -->
                </select>
            </div>
        </div>

        <div class="col-md-4 mx-auto mb-3">
            <div class="form-group">
                <label for="filtroPeso">Filtrar por Peso:</label>
                <select id="filtroPeso" class="form-control">
                    <option value="">Todos</option>
                    <option value="1000">Menos de 1000 kg</option>
                    <!-- Agrega otras opciones aquí -->
                </select>
            </div>
        </div>
    </div>

    <form id="consolidarForm" action="{{ route('paquetes.consolidar') }}" method="POST">
        @csrf
        <input type="hidden" id="selectedPackages" name="selectedPackages" value="">
      
   
        <div class="form-group">
            <label for="selectedCamion">Camión:</label>
            <select class="form-control" id="selectedCamion" name="selectedCamion" required>
                @foreach($camiones as $camion)
                <option value="{{ $camion->id_camion }}">{{ $camion->id_camion }}</option>
                @endforeach
            </select>
        </div>
        
    </form>

    <div class="table-responsive text-center">
        <table class="table table-hover table-lg w-auto">
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
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody id="paquetesData">
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
                    <td><input type="checkbox" name="seleccionarPaquete" value="{{ $paquete->id }}" data-peso="{{ $paquete->peso }}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="alert alert-info" role="alert" id="sumaPesosLabel">Peso Total del envío en kg: 0.00 kg</div>
    <button type="button" class="btn btn-primary" onclick="consolidarPaquetes()">Consolidar Paquetes</button>
    
</div>

<script>


let sumaPesos = 0;


const sumaPesosLabel = document.getElementById('sumaPesosLabel');
const checkboxes = document.querySelectorAll('input[name="seleccionarPaquete"]');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const pesoDelPaquete = parseFloat(this.getAttribute('data-peso'));

        if (this.checked) {
            sumaPesos += pesoDelPaquete;
        } else {
            sumaPesos -= pesoDelPaquete;
        }

        
        sumaPesosLabel.textContent = `Peso Total del envío en kg: ${sumaPesos.toFixed(2)} kg`;

        if (sumaPesos >= 1000) {
            alert("El peso total es  mayor a 1000 kg. Máxima capacidad de carga alcanzada");
            sumaPesos = 0; 
            desmarcarCheckboxes(); 
        }
    });
});

function consolidarPaquetes() { 

    const camionSeleccionado = parseInt(document.getElementById('selectedCamion').value);   
    const checkboxes = document.querySelectorAll('input[name="seleccionarPaquete"]:checked');

    if (checkboxes.length === 0) {
        alert("Selecciona al menos un paquete para consolidar.");
        return;
    }

    const selectedPackages = Array.from(checkboxes).map(checkbox => checkbox.value);   
    document.getElementById('selectedPackages').value = JSON.stringify({ Paquetes: selectedPackages });   
    document.getElementById('consolidarForm').submit();
}


function desmarcarCheckboxes() {
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
    sumaPesosLabel.textContent = "Peso Total del envío en kg: 0.00 kg";
    sumaPesos = 0;
}



</script>

   <!-- Enlace al archivo de jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Enlace al archivo de DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>
</html>
