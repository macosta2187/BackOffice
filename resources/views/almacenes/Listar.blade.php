<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Almacenes</title>
    <link rel="stylesheet" type="text/css" href="/jquery.dataTables.css">

    <style>
 body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }

        .container {
            width: 100%;
            max-width: 100%;
            padding: 20px;            
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #333; 
            color: #fff; 
            font-weight: bold; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        .edit-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .delete-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

    </style>
   
</head>
<body>
    <div class="container">
        <h1>Lista de Almacenes</h1>
        <table id="tabla-almacenes" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Localidad</th>
                    <th>Departamento</th>
                    <th>Teléfono</th> 
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->nombre }}</td>
                        <td>{{ $almacen->calle }}</td>
                        <td>{{ $almacen->numero }}</td>
                        <td>{{ $almacen->localidad }}</td>
                        <td>{{ $almacen->departamento }}</td>
                        <td>{{ $almacen->telefono }}</td>
                        <td>
                            <a href="{{ route('almacenes.Editar', $almacen->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('almacenes.eliminar', $almacen->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery.dataTables.js') }}"></script> 
    <script>
     $(document).ready(function() {
            $('#tabla-almacenes').DataTable({
                "language": {
                    "url": "{{ asset('es-ES.json') }}"
                }
            });
        });
    </script>
</body>
</html>
