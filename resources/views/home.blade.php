<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ADN Gestion</title>	
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>

<style>
      @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap');

.usuario-logueado {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: rgba(255, 255, 255, 0.8); 
  padding: 5px 10px;
  border-radius: 5px;
}

*{
margin: 0;
padding: 0;
list-style: none;
text-decoration: none;
box-sizing: border-box;
font-family: 'Montserrat', sans-serif;
}
body{
  background-image: url('fondo.jpg');
  background-repeat: no-repeat;
 
  
  margin: 0;
    padding: 0;
}
.wrapper{
margin: 10px;
}
.wrapper .top_navbar{
width: calc(100% - 20px);
height: 60px;
display: flex;
position: fixed;
top: 10px;
}

.wrapper .top_navbar .hamburger{
width: 70px;
height: 100%;
background: #f85c3d;
padding: 15px 17px;
border-top-left-radius: 20px;
cursor: pointer;
}

.wrapper .top_navbar .hamburger div{
width: 35px;
height: 4px;
background: #ffff;
margin: 5px 0;
border-radius: 5px;
}

.wrapper .top_navbar .top_menu{
width: calc(100% - 70px);
height: 100%;
background: #f85c3d;
border-top-right-radius: 20px;
display: flex;
justify-content: space-between;
align-items: center;
padding: 0 20px;
box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}

.wrapper .top_navbar .top_menu .logo{
color: #ffff;
font-size: 20px;
font-weight: 700;
letter-spacing: 3px;
}

.wrapper .top_navbar .top_menu ul{
display: flex;
}

.wrapper .top_navbar .top_menu ul li a{
display: block;
margin: 0 10px;
width: 35px;
height: 35px;
line-height: 35px;
text-align: center;
border: 1px solid #2e4ead;
border-radius: 50%;
color: #ffff;
}

.wrapper .top_navbar .top_menu ul li a:hover{
background: #4360b5;
color: #fff;
}

.wrapper .top_navbar .top_menu ul li a:hover i{
color: #fff;
}

.wrapper .sidebar{
position: fixed;
top: 70px;
left: 10px;
background: #4d45b2;
width: 200px;
height: calc(100% - 80px);
border-bottom-left-radius: 20px;
transition: all 0.3s ease;
}

.wrapper .sidebar ul li a{
display: block;
padding: 20px;
color: #fff;
position: relative;
margin-bottom: 1px;
color: #92a6ef85c3d2;
white-space: nowrap;
}

.wrapper .sidebar ul li a:before{
content: "";
position: absolute;
top: 0;
left: 0;
width: 3px;
height: 100%;
background: #ffff;
display: none;
}



.wrapper .sidebar ul li a span.icon{
margin-right: 10px;
display: inline-block;
}

.wrapper .sidebar ul li a span.title{
display: inline-block;
}

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
background: #f85c3d;
color: #fff;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
display: block;
}

.wrapper .main_container{
width: (100% - 200px);
margin-top: 70px;
margin-left: 200px;
padding: 15px;
transition: all 0.3s ease;
}

.wrapper .main_container .item{
background: #f85c3d;
margin-bottom: 10px;
padding: 15px;
font-size: 14px;
line-height: 22px;
}

.wrapper.collapse .sidebar{
width: 70px;
}

.wrapper.collapse .sidebar ul li a{
text-align: center; 
}

.wrapper.collapse .sidebar ul li a span.icon{
margin: 0;
}

.wrapper.collapse .sidebar ul li a span.title{
display: none;
}

.wrapper.collapse .main_container{
width: (100% - 70px);
margin-left: 70px;
}






       
:root {
  --background-color: #ffffff;
  --text-color: #333333;
}


.dark-mode {
  --background-color: #333333;
  --text-color: #ffffff;
}

body {
  background-color: var(--background-color);
  color: var(--text-color);
}


#dark-mode-toggle {
  background-color: var(--background-color);
  color: var(--text-color);
  border: none;
  cursor: pointer;
}
    </style>

<body>




</body>






@extends('layouts.app')
  @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">   
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

  <div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div>ADN</div>
      <ul>
        <li><div id="contenido"></div></li>
      </ul>
    </div>
  </div>
  <div class="sidebar">
    <ul>
      <li><a href="/home" id="home">
        <span class="icon"><i class="fas fa-file-video"></i></span>
        <span class="title">Home</span>
      </a></li>
      <li><a href="/empleados/Listar" id="listarEmpleado">
        <span class="icon"><i class="fas fa-file-video"></i></span>
        <span class="title">Empleado</span>
      </a></li>
      <li><a href="/almacenes/Ingresar" id="altaAlmacen">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Almacen</span>
      </a></li>
      <li><a href="/paquetes/Ingresar" id="paquetes">
        <span class ="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Paquetes</span>
      </a></li>
      <li><a href="/vehiculos/Ingreso" id="vehiculosAlta">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Vehiculos</span>
      </a></li>
      <li><a href="/empresas/Listar" id="empresasingresar">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Empresas</span>
      </a></li>
      <li><a href="/seguimiento" id="seguimiento">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Seguimiento</span>
      </a></li>
      <li><a href="/LotePaquete" id="LotePaquete">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Lotes</span>
      </a></li>
      <li><a href="/fletes" id="PaqueteEstado">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Fletes</span>
      </a></li>

      <li><a href="/paquetes/desconsolidar" id="PaqueteDestino">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Arrivos</span>
      </a></li>

      <li><a href="/clientes/Ingresar" id="clientesInsertar">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Clientes</span>
      </a></li>

      <li><a href="/grafica" id="estaditicas">
        <span class="icon"><i class="fas fa-blog"></i></span>
        <span class="title">Estadisticas</span>
      </a></li>
      

    </ul>
  </div>
  <iframe id="formulario" src="" frameborder="0" width="100%" height="900" style="margin-top: 110px;"></iframe>
</div>

<script>
  const enlaceAltaAlmacen = document.getElementById("altaAlmacen");
  enlaceAltaAlmacen.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/almacenes/Ingresar";
  });

  const listarEmpleado = document.getElementById("listarEmpleado");
  listarEmpleado.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/empleados/Listar";
  });

  const paquetes = document.getElementById("paquetes");
  paquetes.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/paquetes/Ingresar";
  });

  const vehiculosAlta = document.getElementById("vehiculosAlta");
  vehiculosAlta.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/vehiculos/Ingresar";
  });

  const empresas = document.getElementById("empresasingresar");
  empresas.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/empresas/Listar";
  });

  const seguimientos = document.getElementById("seguimiento");
  seguimientos.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/seguimiento";
  });



  const LotePaquete = document.getElementById("LotePaquete");
  LotePaquete.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/LotePaquete";
  });


  const PaqueteEstado = document.getElementById("PaqueteEstado");
  PaqueteEstado.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/fletes";
  });

  const PaqueteDestino = document.getElementById("PaqueteDestino");
  PaqueteDestino.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/paquetes/desconsolidar";

  });


  const clientesInsertar = document.getElementById("clientesInsertar");
  clientesInsertar.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/clientes/Ingresar";

  });

  const estaditicas = document.getElementById("estaditicas");
  estaditicas.addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("formulario").src = "/grafica";

  });

  

  document.addEventListener('DOMContentLoaded', function () {
    var logoutLink = document.getElementById('logout-link');

    if (logoutLink) {
      logoutLink.addEventListener('click', function (event) {
        event.preventDefault();
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

</body>
</html>
