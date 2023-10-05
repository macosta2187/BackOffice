<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" type="text/css" href="/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
   
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #fff;
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
        <h1>Lista de empleados</h1>
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Fecha de nacimiento</th>
                    <th>Funcionario de Almacén</th>
                    <th>Funcionario Chofer</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->ci }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->celular }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->fechanac }}</td>
                        <td>{{ $empleado->es_almacen ? 'Sí' : 'No' }}</td>
                        <td>{{ $empleado->es_chofer ? 'Sí' : 'No' }}</td>
                        <td><a href="{{ route('empleados.Editar', $empleado->id) }}" class="edit-button">Editar</a></td>
                        <td>
                            <form action="{{ route('empleados.eliminar', $empleado->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr id="no-results-row">
                        <td colspan="10">No se encontraron resultados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery.dataTables.js') }}"></script>  
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "language": {
                    "url": "{{ asset('es-ES.json') }}"
                }
            });
        });
    </script>
</body>
</html>

