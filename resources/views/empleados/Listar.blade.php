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
    background-color: #e0e0e0; /* Cambia el color de fondo al pasar el mouse */
}

    </style>

</head>
<body>
    <div class="container">
        <h1>Lista de empleados</h1>
        <table>
            <tr>
                <th>Ci</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Fecha de nacimiento</th>                
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @forelse($empleados as $empleado)
                <tr>
                    <td data-label="Ci">{{ $empleado->ci }}</td>
                    <td data-label="Nombre">{{ $empleado->nombre }}</td>
                    <td data-label="Apellido">{{ $empleado->apellido }}</td>
                    <td data-label="Celular">{{ $empleado->celular }}</td>
                    <td data-label="Email">{{ $empleado->email }}</td>
                    <td data-label="Fecha de nacimiento">{{ $empleado->fechanac }}</td>                    
                    <td data-label="Editar">
                        <a href="{{ route('empleados.Editar', $empleado->id) }}" class="edit-button">Editar</a>
                    </td>
                    <td data-label="Eliminar">
                        <form action="{{ route('empleados.eliminar', $empleado->id) }}" method="POST" class="delete-form">
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
