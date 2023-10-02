<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ingreso de Paquetes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: left; /* Alinea el texto a la izquierda */
            margin-top: 20px; /* Agrega un poco de espacio arriba */
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Ingreso de Paquetes</h1>

    <form id="myForm" action="{{ route('paquetes.Insertar') }}" method="POST">
        @csrf


        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required>

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" required>

        <label for="numero">Número:</label>
        <input type="numeric" id="numero" name="numero" required>

        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" required>

        <label for="departamento">Departamento:</label>
<select id="departamento" name="departamento" required>
  <option value="Artigas">Artigas</option>
  <option value="Canelones">Canelones</option>
  <option value="Cerro Largo">Cerro Largo</option>
  <option value="Colonia">Colonia</option>
  <option value="Durazno">Durazno</option>
  <option value="Flores">Flores</option>
  <option value="Florida">Florida</option>
  <option value="Lavalleja">Lavalleja</option>
  <option value="Maldonado">Maldonado</option>
  <option value="Montevideo">Montevideo</option>
  <option value="Paysandú">Paysandú</option>
  <option value="Río Negro">Río Negro</option>
  <option value="Rivera">Rivera</option>
  <option value="Rocha">Rocha</option>
  <option value="Salto">Salto</option>
  <option value="San José">San José</option>
  <option value="Soriano">Soriano</option>
  <option value="Tacuarembó">Tacuarembó</option>
  <option value="Treinta y Tres">Treinta y Tres</option>
</select>



<label for="telefono">Teléfono:</label>
<input type="tel" id="telefono" name="telefono" required>


<label for="estatus">Estatus:</label>
<select id="estatus" name="estatus" required>
  <option value="Ingresado">Ingresado</option>
  <option value="EnAlmacenOrigen">En almacen origen</option>
  <option value="EnTransito">En transito</option>
  <option value="EnAlmacenDestino">En almacen destino</option>
  <option value="DisponibleEnPickUp">Disponible en pick up</option>
  <option value="EnDistribucion">En distribucion</option>
  <option value="ReagendaEntrega">Reagenda entrega</option>
  <option value="Entregado">Entregado</option>
</select>


       <label for="tamaño">Tamaño:</label>
       <select id="tamaño" name="tamaño" required>
       <option value="Pequeño">Pequeño</option>
       <option value="Mediano">Mediano</option>
       <option value="Grande">Grande</option>      
       </select>


        <label for="peso">Peso:</label>
        <input type="number" step="0.01" id="peso" name="peso" >

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required readonly>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required readonly>



        <input type="submit" value="Guardar">
    </form>

    <script>

const fechaActual = new Date();
  
  
  const fechaISO = fechaActual.toISOString().slice(0, 10); 
  const horaISO = fechaActual.toISOString().slice(11, 16); 
  
  
  document.getElementById("fecha").value = fechaISO;
  document.getElementById("hora").value = horaISO;


</script>
</body>
</html>
