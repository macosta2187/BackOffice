<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Ingresados en Sistema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        td select {
            width: 100%;
            padding: 5px;
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
    </style>
</head>
<body>
    <h1>Paquetes Ingresados en Sistema</h1>
    <h1>Seleccionar paquetes y asignar Lote de envio</h1>

    <form id="asignarLoteForm" method="POST" action="{{ route('asignar.lote') }}">
    @csrf
    <div style="text-align: center;">
    <label for="comboLote" style="font-size: 16px; color: blue;">Ingresar un lote de la lista:</label>   
    <input type="number" id="comboLote" name="lote" style="font-size: 16px; background-color: lightgray; border: 2px solid blue;">
</div>

        <div style="overflow-x:auto;">
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
                        <th>Peso</th>
                        <th>Teléfono contacto</th>
                        <th>Fecha de recepcion</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                        <tr>
                            <td>{{ $paquete->id }}</td>
                            <td><input type="text" name="calle" value="{{ $paquete->calle }}" readonly></td>
                            <td><input type="text" name="numero" value="{{ $paquete->numero }}"readonly></td>
                            <td><input type="text" name="localidad" value="{{ $paquete->localidad }}"readonly></td>
                            <td><input type="text" name="departamento" value="{{ $paquete->departamento }}"readonly></td>
                            <td>
                        <select name="estatus">
                        <option value="En viaje" {{ $paquete->estatus == 'En Viaje' ? 'selected' : '' }}>En Viaje</option>
                        <option value="Entregado" {{ $paquete->estatus == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                       <option value="Despachado" {{ $paquete->estatus == 'Despachado' ? 'selected' : '' }}>Despachado</option>
                      </select>
                         </td>

                            <td><input type="text" name="tamaño" value="{{ $paquete->tamaño }}"readonly></td>
                            <td><input type="text" name="peso" value="{{ $paquete->peso }}"readonly></td>
                            <td><input type="text" name="telefono" value="{{ $paquete->telefono }}"readonly></td>
                            <td><input type="date" name="fecha" value="{{ $paquete->fecha }}"readonly></td>

                            <td><input type="checkbox" name="seleccionar[]" value="{{ $paquete->id }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button id="asignarLoteBtn" type="submit">ASIGNAR LOTE</button>
        <button id="eliminarPaquetesBtn" type="button">ELIMINAR PAQUETES</button>

    </form>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const asignarLoteForm = document.getElementById("asignarLoteForm");
    const comboLote = document.getElementById("comboLote");
    const asignarLoteBtn = document.getElementById("asignarLoteBtn");
    const eliminarPaquetesBtn = document.getElementById("eliminarPaquetesBtn");

        asignarLoteBtn.addEventListener("click", function () {
        const selectedLote = comboLote.value;

        const selectedPaquetes = [];

        const checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
        checkboxes.forEach((checkbox) => {
            selectedPaquetes.push(checkbox.value);
            
        });

        const loteInput = document.createElement("input");
        loteInput.setAttribute("type", "hidden");
        loteInput.setAttribute("name", "lote");
        loteInput.setAttribute("value", selectedLote);


        const calleInput = document.createElement("input");
        calleInput.setAttribute("type", "hidden");
        calleInput.setAttribute("name", "calle");
        calleInput.setAttribute("value", selectedPaquetes.join(","));


        const numeroInput = document.createElement("input");
        numeroInput.setAttribute("type", "hidden");
        numeroInput.setAttribute("name", "numero");
        numeroInput.setAttribute("value", selectedPaquetes.join(","));

        const localidadInput = document.createElement("input");
        localidadInput.setAttribute("type", "hidden");
        localidadInput.setAttribute("name", "localidad");
        localidadInput.setAttribute("value", selectedPaquetes.join(","));

        const departamentoInput = document.createElement("input");
        departamentoInput.setAttribute("type", "hidden");
        departamentoInput.setAttribute("name", "departamento");
        departamentoInput.setAttribute("value", selectedPaquetes.join(","));

        const estatusInput = document.createElement("input");
        estatusInput.setAttribute("type", "hidden");
        estatusInput.setAttribute("name", "estatus");
        estatusInput.setAttribute("value", selectedPaquetes.join(","));

        const tamañoInput = document.createElement("input");
        tamañoInput.setAttribute("type", "hidden");
        tamañoInput.setAttribute("name", "tamaño");
        tamañoInput.setAttribute("value", selectedPaquetes.join(","));

        const pesoInput = document.createElement("input");
        pesoInput.setAttribute("type", "hidden");
        pesoInput.setAttribute("name", "peso");
        pesoInput.setAttribute("value", selectedPaquetes.join(","));

        const telefonoInput = document.createElement("input");
        telefonoInput.setAttribute("type", "hidden");
        telefonoInput.setAttribute("name", "telefono");
        telefonoInput.setAttribute("value", selectedPaquetes.join(","));

        const fechaInput = document.createElement("input");
        fechaInput.setAttribute("type", "hidden");
        fechaInput.setAttribute("name", "fecha");
        fechaInput.setAttribute("value", selectedPaquetes.join(","));

        const paquetesInput = document.createElement("input");
        paquetesInput.setAttribute("type", "hidden");
        paquetesInput.setAttribute("name", "paquetes");
        paquetesInput.setAttribute("value", selectedPaquetes.join(","));


        asignarLoteForm.submit();
    });

    eliminarPaquetesBtn.addEventListener("click", function () {
                const selectedPaquetes = [];

                const checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
                checkboxes.forEach((checkbox) => {
                    selectedPaquetes.push(checkbox.value);
                });

                if (selectedPaquetes.length > 0) {
                    if (confirm("¿Desea eliminar los paquetes seleccionados?")) {                     
                       const form = document.getElementById("asignarLoteForm");
                       form.submit();
                    }
                } else {
                    alert("Debe seleccionar al menos un paquete para eliminar.");
                }
            });
        });
    </script>
</body>
</html>



