
<!--
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #F85C3D;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
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
            background-color: #f2f2f2;
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
        <h1>Lista de vehiculo</h1>
        <table>
            <tr>
                <th>matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Peso</th>
                <th>Capacidad</th>                
                <th>id_chofer</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @forelse($vehiculos as $vehiculo)
                <tr>
                    <td data-label="matricula">{{ $vehiculo->matricula }}</td>
                    <td data-label="marca">{{ $vehiculo->marca }}</td>
                    <td data-label="modelo">{{ $vehiculo->modelo }}</td>
                    <td data-label="peso">{{ $vehiculo->peso }}</td>
                    <td data-label="capacidad_peso">{{ $vehiculo->capacidad }}</td>                    
                    <td data-label="id_chofer">{{ $vehiculo->id_chofer }}</td>
                    <td data-label="Editar">
                        <a href="{{ route('vehiculos.Editar', $vehiculo->id) }}" class="edit-button">Editar</a>
                    </td>
                    <td data-label="Eliminar">
                    <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr id="no-results-row">
                    <td colspan="8">No se encontraron resultados.</td>
                </tr>
            @endforelse
        </table>
    </div>
</body>
</html>
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
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
            max-width: 800px;
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
        <h1>Lista de vehículo</h1>
        <table id="tabla-vehiculos">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Peso</th>
                    <th>Capacidad</th>                
                    <th>ID Chofer</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td data-label="Matrícula">{{ $vehiculo->matricula }}</td>
                        <td data-label="Marca">{{ $vehiculo->marca }}</td>
                        <td data-label="Modelo">{{ $vehiculo->modelo }}</td>
                        <td data-label="Peso">{{ $vehiculo->peso }}</td>
                        <td data-label="Capacidad">{{ $vehiculo->capacidad }}</td>                    
                        <td data-label="ID Chofer">{{ $vehiculo->id_chofer }}</td>
                        <td data-label="Editar">
                            <a href="{{ route('vehiculos.Editar', $vehiculo->id) }}" class="edit-button">Editar</a>
                        </td>
                        <td data-label="Eliminar">
                            <form action="{{ route('vehiculos.eliminar', ['id' => $vehiculo->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr id="no-results-row">
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
            $('#tabla-vehiculos').DataTable({
                "language": {
                    "url": "{{ asset('es-ES.json') }}"
                }
            });
        });
    </script>
</body>
</html>


