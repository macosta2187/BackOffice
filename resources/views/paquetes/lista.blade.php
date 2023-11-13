<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Ingresados</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/jquery.dataTables.css') }}">
</head>
<body>
<script src="{{ asset('bootstrap/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.dataTables.js') }}"></script>

    <div class="container mt-5">
    <h1 class="text-center">Lista de Paquetes cargados en sistema no Cosolidados</h1>
    <h1 class="text-center">Se permite Edicion y cambio de estado</h1>

    <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable">
           <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th>
                    <th>Estado Actual</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <th>Fecha de Creación</th>
                    <th>Hora de Creación</th>
                    <th>Código de Seguimiento</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <th>Actualizar Estado</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($paquetes as $paquete)
                @csrf                
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
                        <td>
                            <a href="{{ route('paquetes.Editar', $paquete->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                        <form action="{{ route('paquetes.Eliminar', $paquete->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{ route('paquetes.Estado', $paquete->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="estado" class="form-control">
                                    <option value="Ingresado" {{ $paquete->estado === 'Ingresado' ? 'selected' : '' }}>Ingresado</option>
                                    <option value="En almacén origen" {{ $paquete->estado === 'En almacén origen' ? 'selected' : '' }}>En almacén origen</option>
                                    <option value="En tránsito" {{ $paquete->estado === 'En tránsito' ? 'selected' : '' }}>En tránsito</option>
                                    <option value="En almacén destino" {{ $paquete->estado === 'En almacén destino' ? 'selected' : '' }}>En almacén destino</option>
                                    <option value="Disponible en pick up" {{ $paquete->estado === 'Disponible en pick up' ? 'selected' : '' }}>Disponible en pick up</option>
                                    <option value="En distribución" {{ $paquete->estado === 'En distribución' ? 'selected' : '' }}>En distribución</option>
                                    <option value="Reagenda entrega" {{ $paquete->estado === 'Reagenda entrega' ? 'selected' : '' }}>Reagenda entrega</option>
                                    <option value="Entregado" {{ $paquete->estado === 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <td><a href="{{ route('paquetes.Listar')}}" class="btn btn-primary">Consolidar</a></td>
        <td><a href="{{ route('paquetes.Insertar')}}" class="btn btn-primary">Ingresar</a></td>
    </div>
    </div>
     
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla-paquetes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" 
                }
            });
        });
    </script>

</body>
</html>
