<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidar</title>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<h1 class="text-center">Paquetes a Consolidar</h1>
<header class="bg-custom-orange text-white"></header>
<div class="container text-center">
    <div class="row">
        <div class="col-md-4 mx-auto mb-3">
            <div class="form-group">
                <label for="filtroGrupo">Filtrar por Grupo:</label>
                <select id="filtroGrupo" class="form-control">
                    <option value="">Todos</option>
                    <option value="Grupo 1">Grupo 1</option>
                    <option value="Grupo 2">Grupo 2</option>
                    <option value="Grupo 3">Grupo 3</option>
                    <option value="Grupo 4">Grupo 4</option>
                    <option value="Grupo 5">Grupo 5</option>
                </select>
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

        <div class="table-responsive w-100">
            <table class="table table-hover table-lg">
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
    </div>
    <div class="alert alert-info" role="alert" id="sumaPesosLabel">Peso Total del envío en kg: 0.00 kg</div>
    <button type="button" class="btn btn-success" onclick="consolidarPaquetes()">Consolidar Paquetes</button>
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
const filtroGrupo = document.getElementById("filtroGrupo");
const paquetesData = document.getElementById("paquetesData").querySelectorAll("tr");

filtroGrupo.addEventListener("change", function() {
    const selectedGrupo = this.value;

    paquetesData.forEach(row => {
        const departamento = row.querySelector("td:nth-child(6)").textContent;

        if (selectedGrupo === "" || 
    (selectedGrupo === "Grupo 5" && (departamento === "Maldonado" || departamento === "Rocha")) ||
    (selectedGrupo === "Grupo 4" && (departamento === "Lavalleja" || departamento === "Trinta y Tres" || departamento === "Cerro Largo")) ||
    (selectedGrupo === "Grupo 3" && (departamento === "Flores" || departamento === "San José" || departamento === "Paysandú" || departamento === "Salto")) ||  // Agregado "||" después de "Paysandú"
    (selectedGrupo === "Grupo 2" && (departamento === "Colonia" || departamento === "Río Negro" || departamento === "Soriano")) ||
    (selectedGrupo === "Grupo 1" && (departamento === "Montevideo" || departamento === "Canelones" || departamento === "Florida" || departamento === "Durazno" || departamento === "Rivera" || departamento === "Artigas" || departamento === "Tacuarembó"))) {
    row.style.display = "";
} else {
    row.style.display = "none";
}

    });
});


</script>

   

</body>
</html>
