<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asignar chofer</title>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Lista de empleados</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Chofer</th>
                </tr>
            </thead>
            <tbody>
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
              
            </tbody>
        </table>
    </div>
</body>
</html>


 
       
