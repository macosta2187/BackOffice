<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Formulario de Ingreso de Paquetes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Ingreso de Paquetes</h1>

        <form id="myForm" action="{{ route('paquetes.Insertar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" required maxlength="5">
            </div>

            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" required maxlength="25">
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <select class="form-control" id="departamento" name="departamento" required>
                    <option value="Artigas">Artigas</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Cerro Largo">Cerro Largo</option>
                    <!-- Otras opciones de departamento -->
                </select>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required maxlength="9">
            </div>

            <div class="form-group">
                <label for="estado">Estatus:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="Ingresado">Ingresado</option>
                    <option value="EnAlmacenOrigen">En almacén origen</option>
                    
                </select>
            </div>
        


            <div class="form-group">
                <label for="tamaño">tamaño:</label>
                <input type="number" step="0.01" class="form-control" id="tamaño" name="tamaño">
            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso">
            </div>

            <div class="form-group">
                <label for="fecha_creacion">Fecha:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required readonly>
            </div>

            <div class="form-group">
                <label for="hora_creacion">Hora:</label>
                <input type="time" class="form-control" id="hora_creacion" name="hora_creacion" required readonly>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <script>
            const fechaActual = new Date();
            const fechaISO = fechaActual.toISOString().slice(0, 10);
            const horaISO = fechaActual.toISOString().slice(11, 16);
            document.getElementById("fecha_creacion").value = fechaISO;
            document.getElementById("hora_creacion").value = horaISO;
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</body>
</html>

