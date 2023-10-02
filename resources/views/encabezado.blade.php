<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/encabezado.css" />
</head>
<body>



<div id="mySidenav" class="sidenav">
    <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li><a href="/home">Home</a></li>
        <li>
            <a href="#">Almacenes</a>
            <ul class="submenu">
                <li><a href="/almacenes/Ingresar">Ingreso</a></li>
                <li><a href="/almacenes/Listar">Listar</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Empleados</a>
            <ul class="submenu">
                <li><a href="/empleados/Ingresar">Ingreso</a></li>
                <li><a href="/empleados/Listar">Listar</a></li>
            </ul>
        </li>
        <li><a href="#">Paquetes</a>
            <ul class="submenu">
                <li><a href="/paquetes/Ingresar">Ingresar</a></li>
                <li><a href="/paquetes/Listar">Listar</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Vehiculos</a>
            <ul class="submenu">
                <li><a href="/vehiculos/Ingresar">Ingreso</a></li>
                <li><a href="/vehiculos/Listar">Listar</a></li>
            </ul>
        </li>
        <li><a href="{{ route('register') }}">Registrarse</a></li>
    </ul>
</div>








<div id="main">
  
  <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


</script>





</body>
</html>
