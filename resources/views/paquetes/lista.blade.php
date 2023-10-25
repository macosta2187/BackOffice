<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Paquetes Ingresados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Paquetes Ingresados</h1>
        <table class="table table-hover">
            <thead>
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
                    <th>Código de Seguimiento</th>
                    <th>Editar</th>
                    <th>Borrar</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
