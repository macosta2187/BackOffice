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
        <option value="Colonia">Colonia</option>
        <option value="Durazno">Durazno</option>
        <option value="Flores">Flores</option>
        <option value="Florida">Florida</option>
        <option value="Lavalleja">Lavalleja</option>
        <option value="Maldonado">Maldonado</option>
        <option value="Montevideo">Montevideo</option>
        <option value="Paysandú">Paysandú</option>
        <option value="Río Negro">Río Negro</option>
        <option value="Rivera">Rivera</option>
        <option value="Rocha">Rocha</option>
        <option value="Salto">Salto</option>
        <option value="San José">San José</option>
        <option value="Soriano">Soriano</option>
        <option value="Tacuarembó">Tacuarembó</option>
        <option value="Treinta y Tres">Treinta y Tres</option>
        
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
        <option value="En almacén origen">En almacén origen</option>
        <option value="En tránsito">En tránsito</option>
        <option value="En almacén destino">En almacén destino</option>
        <option value="Disponible en pick up">Disponible en pick up</option>
        <option value="En distribución">En distribución</option>
        <option value="Reagenda entrega">Reagenda entrega</option>
        <option value="Entregado">Entregado</option>
    </select>
</div>

        


            <div class="form-group">
                <label for="tamaño">tamaño:</label>
                <input type="number" step="1.00" class="form-control" id="tamaño" name="tamaño">
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

            <div class="form-group">
    <label for="empresa">Selecciona una empresa:</label>
    <select class="form-control" id="empresa" name="empresa">
        <option value=""></option>
        @foreach ($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
        @endforeach
    </select>
</div>



            <button type="submit" class="btn btn-primary">Guardar</button>
            <td><a href="{{ route('paquetes.Listar')}}" class="btn btn-primary">Consolidar</a></td>
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

