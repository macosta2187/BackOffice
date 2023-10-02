<!doctype html>
<html lang="en">

<head>
  <title>ADN</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/encabezado.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    body {
      background-image: url('fondo.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    /* Estilos para el texto en la esquina superior derecha */
    .usuario-logueado {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para legibilidad */
      padding: 5px 10px;
      border-radius: 5px;
    }
  </style>

</head>

<body>
  @extends('layouts.app')
  @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
    

          <!-- <div class="card-header">{{ __('Dashboard') }}</div>-->

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
  @include("encabezado")

 
  <div class="usuario-logueado">
    {{ __('Usuario logueado') }}
  </div>

  @endsection

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

