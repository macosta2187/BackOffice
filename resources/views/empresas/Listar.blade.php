<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empresas</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css">
</head>
<body>
<div class="container text-center">
        <h1 class="my-5">Lista de empresas </h1>
        <div class="col-12 d-flex justify-content-end align-items-start mb-2">
        <a href="{{ route('empresas.Insertar') }}" class="btn btn-secondary">Insertar Empresa</a>
            </div>
</div>
    <div class="container ">

         <div class="table-responsive">
            <table id="tabla-empresas" class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Calle</th>
                        <th>Número</th>
                        <th>Localidad</th>
                        <th>Departamento</th>
                        <th>Teléfono</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->RUT }}</td>
                            <td>{{ $empresa->nombre }}</td>
                            <td>{{ $empresa->calle }}</td>
                            <td>{{ $empresa->numero }}</td>
                            <td>{{ $empresa->localidad }}</td>
                            <td>{{ $empresa->departamento }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>
                                <form method="POST" action="{{ route('empresas.Eliminar', $empresa->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           
         </div>


    
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.flash.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#tabla-empresas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });

           
            $('#exportar-excel').on('click', function() {
                table.button('.buttons-excel').trigger();
            });
        });
    </script>
</body>
</html>

