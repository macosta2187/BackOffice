<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asignar chofer</title>
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

        .chofer-checkbox {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de empleados</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Chofer</th>
            </tr>
            <tr>
                <td data-label="ID">1</td>
                <td data-label="Nombre">Juan</td>
                <td data-label="Apellido">Pérez</td>
                <td data-label="Chofer"><input type="checkbox" class="chofer-checkbox"></td>
            </tr>
            <tr>
                <td data-label="ID">2</td>
                <td data-label="Nombre">María</td>
                <td data-label="Apellido">Gómez</td>
                <td data-label="Chofer"><input type="checkbox" class="chofer-checkbox"></td>
            </tr>
            <!-- Agrega más filas según tus datos -->
        </table>
    </div>
</body>
</html>

 
       
