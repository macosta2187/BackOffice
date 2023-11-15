<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paquete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Paquete</h1>
        <form action="{{ route('paquetes.Actualizar', $paquete->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $paquete->descripcion }}">
            </div>
            
            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" value="{{ $paquete->calle }}" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" value="{{ $paquete->numero }}" required maxlength="5">
            </div>
            
            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $paquete->localidad }}"required maxlength="25">
            </div>

            <div class="form-group">
    <label for="departamento">Departamento:</label>
    <select class="form-control" id="departamento" name="departamento" value="{{ $paquete->departamento }}" required>
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
</div>


            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $paquete->telefono }}"required maxlength="9">
            </div>

<div class="form-group">
    <label for="estado">Estatus:</label>
    <select class="form-control" id="estado" name="estado" value="{{ $paquete->estado }}" required>
        <option value="Ingresado">Ingresado</option>
        <option value="En almacén origen">En almacén origen</option>
        <option value="En tránsito">En tránsito</option>
        <option value="En almacén destino">En almacén destino</option>
        <option value="Disponible en pick up">Disponible en pick up</option>
        <option value="En distribución">En distribución</option>
        <option value="Reagenda entrega">Reagenda entrega</option>
        <option value="Entregado">Entregado</option>
    </select>
</div>        


            <div class="form-group">
                <label for="tamaño">tamaño:</label>
                <input type="number" step="0.01" class="form-control" id="tamaño" name="tamaño" value="{{ $paquete->tamaño }}"required>

            </div>

            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="{{ $paquete->peso }}"required>
            </div>

            <div class="form-group">
                <label for="fecha_creacion">Fecha:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ $paquete->fecha_creacion }}"required readonly>
            </div>

            <div class="form-group">
                <label for="hora_creacion">Hora:</label>
                <input type="time" class="form-control" id="hora_creacion" name="hora_creacion" value="{{ $paquete->hora_creacion }}"required readonly>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>
