<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Formulario de Ingreso de Paquetes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Ingreso de Paquetes</h1>

        <form id="myForm" action="{{ route('paquetes.Insertar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" required>
            </div>

            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>

            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" required>
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
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="estatus">Estatus:</label>
                <select class="form-control" id="estatus" name="estatus" required>
                    <option value="Ingresado">Ingresado</option>
                    <option value="EnAlmacenOrigen">En almacén origen</option>
                    <!-- Otras opciones de estatus -->
                </select>
            </div>

            <div class="form-group">
                <label for="tamaño">Tamaño:</label>
                <select class="form-control" id="tamaño" name="tamaño" required>
                    <option value="Pequeño">Pequeño</option>
                    <option value="Mediano">Mediano</option>
                    <option value="Grande">Grande</option>
                </select>
            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso">
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required readonly>
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" required readonly>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <script>
            const fechaActual = new Date();
            const fechaISO = fechaActual.toISOString().slice(0, 10);
            const horaISO = fechaActual.toISOString().slice(11, 16);
            document.getElementById("fecha").value = fechaISO;
            document.getElementById("hora").value = horaISO;
        </script>
    </div>

    <!-- Incluye los scripts de Bootstrap y jQuery al final del documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

