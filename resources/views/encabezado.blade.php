<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/encabezado.css" />
</head>
<body>

<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="javascript:void(9)" onclick="cargarFormulario('/home')">Home</a>
<a href="javascript:void(1)" onclick="cargarFormulario('/almacenes/Ingresar')">Ingreso de Almacen</a>
<a href="javascript:void(2)" onclick="cargarFormulario('/almacenes/Listar')">Listar Almacenes</a>
<a href="javascript:void(3)" onclick="cargarFormulario('/empleados/Ingresar')">Empleados Almacenes</a>
<a href="javascript:void(4)" onclick="cargarFormulario('/empleados/Listar')">Empleados Listar</a>
<a href="javascript:void(5)" onclick="cargarFormulario('/paquetes/Ingresar')">Paquetes Ingresar</a>
<a href="javascript:void(6)" onclick="cargarFormulario('/paquetes/Listar')">Paquetes Listar</a>
<a href="javascript:void(7)" onclick="cargarFormulario('/vehiculos/Ingresar')">Ingreso Vehiculos</a>
<a href="javascript:void(8)" onclick="cargarFormulario('/vehiculos/Listar')">Listar Vehiculos</a>




</div>



<div id="formulario-container">
   
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

function cargarFormulario(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {           
            document.getElementById('formulario-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error al cargar el formulario:', error);
        });
}
</script>





</body>
</html>
