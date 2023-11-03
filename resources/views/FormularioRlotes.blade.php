<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Paquetes Ingresados en Sistema</title>

</head>
<body>
    <div class="container">
        <h1>Paquetes Ingresados en Sistema</h1>
        <h2>Seleccionar paquetes y asignar Lote de envío</h2>

        <form id="asignarLoteForm" method="POST" action="{{ route('asignar.lote') }}">
            @csrf
            <div class="text-center mb-3">
                <label for="comboLote" class="form-label">Ingresar un lote de la lista:</label>
                <input type="number" id="comboLote" name="lote" class="form-control">
            </div>

            <div class="table-responsive">
                <table class="table">
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
                            <th>Fecha de recepción</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paquetes as $paquete)
                            <tr>
                                <td>{{ $paquete->id }}</td>
                                <td><input type="text" name="calle" value="{{ $paquete->calle }}" readonly class="form-control"></td>
                                <td><input type="text" name="numero" value="{{ $paquete->numero }}" readonly class="form-control"></td>
                                <td><input type="text" name="localidad" value="{{ $paquete->localidad }}" readonly class="form-control"></td>
                                <td><input type="text" name="departamento" value="{{ $paquete->departamento }}" readonly class="form-control"></td>
                                <td>
                                    <select name="estatus" class="form-select">
                                        <option value="En Viaje" {{ $paquete->estatus == 'En Viaje' ? 'selected' : '' }}>En Viaje</option>
                                        <option value="Entregado" {{ $paquete->estatus == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                        <option value="Despachado" {{ $paquete->estatus == 'Despachado' ? 'selected' : '' }}>Despachado</option>
                                    </select>
                                </td>
                                <td><input type="text" name="tamaño" value="{{ $paquete->tamaño }}" readonly class="form-control"></td>
                                <td><input type="text" name="peso" value="{{ $paquete->peso }}" readonly class="form-control"></td>
                                <td><input type="text" name="telefono" value="{{ $paquete->telefono }}" readonly class="form-control"></td>
                                <td><input type="date" name="fecha" value="{{ $paquete->fecha }}" readonly class="form-control"></td>
                                <td><input type="checkbox" name="seleccionar[]" value="{{ $paquete->id }}" class="form-check-input"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button id="asignarLoteBtn" type="submit" class="btn btn-primary">ASIGNAR LOTE</button>
            <button id="eliminarPaquetesBtn" type="button" class="btn btn-danger">ELIMINAR PAQUETES</button>
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



