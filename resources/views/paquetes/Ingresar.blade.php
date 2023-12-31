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

<div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Ingreso de Paquetes</h1>
            </div>
            <div class="col-12 d-flex justify-content-end align-items-start">
                <a href="{{ route('paquetes.Listar')}}" class="btn btn-outline-info">Consolidar</a>
                <a href="{{ route('paquetes.mostrar')}}" class="btn btn-outline-info">Administracion</a>
            </div>
        </div>
    </div>
    

    <div class="container d-flex align-items-center justify-content-center">

        <form id="myForm" action="{{ route('paquetes.Insertar') }}" method="POST" class="row">
            @csrf

        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required maxlength="50">
                </div>

                <div class="form-group mb-2">
                    <label for="calle">Calle:</label>
                    <input type="text" class="form-control" id="calle" name="calle" required maxlength="50">
                </div>

                <div class="form-group mb-2">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" required maxlength="5">
                </div>

                <div class="form-group mb-2">
                    <label for="localidad">Localidad:</label>
                    <input type="text" class="form-control" id="localidad" name="localidad" required maxlength="25">
                </div>

                <div class="form-group mb-2">
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
            </div>

         
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{9}" required maxlength="9">
                </div>

                <div class="form-group mb-2">
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

                <div class="form-group mb-2">
                    <label for="tamaño">Tamaño:</label>
                    <input type="number" step="1.00" class="form-control" id="tamaño" name="tamaño">
                </div>

                <div class="form-group mb-2">
                    <label for="peso">Peso:</label>
                    <input type="number" step="0.01" class="form-control" id="peso" name="peso">
                </div>

                <div class="form-group mb-2">
                    <label for="fecha_creacion">Fecha:</label>
                    <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="hora_creacion">Hora:</label>
                    <input type="time" class="form-control" id="hora_creacion" name="hora_creacion" required readonly>
                </div>

                <div class="form-group mb-2">
                    <label for="cliente_ci">Cédula del Cliente:</label>
                    <input type="text" class="form-control" id="cliente_ci" name="cliente_ci" pattern="[0-9]{8}" required maxlength="8">
                    @error('cliente_ci')
                        <div class="alert alert-danger">El cliente no existe en el sistema.</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="empresa">Selecciona una empresa:</label>
                    <select class="form-control" id="empresa" name="empresa" required>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

          
            <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>

        <script>
            const fechaActual = new Date();
            fechaActual.setHours(fechaActual.getHours() - 3);
            const fechaISO = fechaActual.toISOString().slice(0, 10);
            const horaISO = fechaActual.toISOString().slice(11, 16);
            document.getElementById("fecha_creacion").value = fechaISO;
            document.getElementById("hora_creacion").value = horaISO;

            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('myForm'); 
                const clienteCiInput = document.getElementById('cliente_ci');

                form.addEventListener('submit', function (event) {
                    if (clienteCiInput.value.trim() === '') {
                        event.preventDefault(); 
                        alert('Por favor, ingresa la Cedula del Cliente.');
                    }
                });
            });
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</body>
</html>
