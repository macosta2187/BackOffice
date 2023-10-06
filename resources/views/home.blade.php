<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/encabezado.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body {
     
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
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

    /* Estilos para el menú lateral */
    #mySidenav {
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      height: 100%;
    }

    #mySidenav ul {
      list-style-type: none;
      padding: 0;
    }

    #mySidenav ul li {
      padding: 5px 15px;
      text-align: left;
    }

    #mySidenav ul li a {
      color: white;
      text-decoration: none;
    }

    #mySidenav ul li a:hover {
      color: #f1f1f1;
    }

    /* Estilos para el área principal */
    #main {
      width: 80%; /* Ajusta el ancho del área principal */
      height: 80vh; /* Ajusta la altura del área principal */
      background-color: white;
      padding: 16px;
      border-radius: 10px;
      
      display: flex;
      justify-content: center; 
      align-items: center; 
    }

    #page-frame {
      width: 120%;
      height: 120%; 
      border: none;
      margin-left: auto;

      
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

  <div class="usuario-logueado">
  {{ Auth::user()->name    }}
  <a class="dropdown-item" href="{{ route('logout') }}" id="logout-link">{{ __('Logout') }}</a>
    {{ __('|Usuario logueado') }}
  </div>
  @endsection
</body>
</html>



<div id="mySidenav" class="sidenav">
  <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
  <ul>

      <a href="#">Empresa</a>
      <ul class="submenu">
        <li><a href="/empresas/Ingresar" class="menu-link" data-page="/empresas/Ingresar">Ingresar</a></li>
        <li><a href="/empresas/Listar" class="menu-link" data-page="/empresas/Listar">Listar</a></li>
      </ul>
    </li>
    <li>

    <a href="#">Consolidar</a>
      <ul class="submenu">
      <li><a href="/paquetes/Listar" class="menu-link" data-page="/paquetes/Listar">Consolidar</a></li>
      
      </ul>
    </li>
    <li>
    


      <a href="#">Almacenes</a>
      <ul class="submenu">
        <li><a href="/almacenes/Ingresar" class="menu-link" data-page="/almacenes/Ingresar">Ingreso</a></li>
        <li><a href="/almacenes/Listar" class="menu-link" data-page="/almacenes/Listar">Listar</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Empleados</a>
      <ul class="submenu">
        <li><a href="/empleados/Ingresar" class="menu-link" data-page="/empleados/Ingresar">Ingreso</a></li>
        <li><a href="/empleados/Listar" class="menu-link" data-page="/empleados/Listar">Listar</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Paquetes</a>
      <ul class="submenu">
        <li><a href="/paquetes/Ingresar" class="menu-link" data-page="/paquetes/Ingresar">Ingresar</a></li>
        
      </ul>
    </li>
    <li>
      <a href="#">Vehiculos</a>
      <ul class="submenu">
        <li><a href="/vehiculos/Ingreso" class="menu-link" data-page="/vehiculos/Ingreso">Ingreso</a></li>
        <li><a href="/vehiculos/Listar" class="menu-link" data-page="/vehiculos/Listar">Listar</a></li>
      </ul>
    </li>
    <li><a href="/registro" class="menu-link" data-page="/registro">Registro</a></li>
  </ul>
</div>

<div id="main">
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  <iframe id="page-frame" src="/inicio" frameborder="5"></iframe>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
  crossorigin="anonymous"></script>
<script>
  function loadPage(pageUrl) {
    document.getElementById("page-frame").src = pageUrl;
  }

  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  function handleMenuClick(event) {
    event.preventDefault();
    var pageUrl = event.target.getAttribute("data-page");
    loadPage(pageUrl);
    closeNav();
  }
  document.addEventListener('DOMContentLoaded', function () {
        var logoutLink = document.getElementById('logout-link');
        
        if (logoutLink) {
            logoutLink.addEventListener('click', function (event) {
                event.preventDefault(); // Evita que el enlace siga el enlace href
                
                // Encuentra el formulario de cierre de sesión y envíalo
                var logoutForm = document.getElementById('logout-form');
                if (logoutForm) {
                    logoutForm.submit();
                }
            });
        }
    });

  var menuLinks = document.querySelectorAll(".menu-link");
  menuLinks.forEach(function (link) {
    link.removeEventListener("click", handleMenuClick); 
    link.addEventListener("click", handleMenuClick);
  });
</script>
