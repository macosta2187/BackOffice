	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Seguimiento de Paquete</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: "Poppins", sans-serif;
}

.step-wizard {
    height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
}

.step-wizard-list {
    background: #fff;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    color: #333;
    list-style-type: none;
    border-radius: 10px;
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}

.step-wizard-item {
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}

.step-wizard-item + .step-wizard-item:after {
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background: #21d4fd;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}

.progress-count {
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index: 10;
    color: transparent;
}

.progress-count:after {
    content: "";
    height: 40px;
    width: 40px;
    background: #21d4fd;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    z-index: -10;
}

.progress-count:before {
    content: "";
    height: 10px;
    width: 20px;
    border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%) rotate(-45deg);
    transform-origin: center center;
}

.progress-label {
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
}

.current-item .progress-count:before,
.current-item ~ .step-wizard-item .progress-count:before {
    display: none;
}

.current-item ~ .step-wizard-item .progress-count:after {
    height: 10px;
    width: 10px;
}

.current-item ~ .step-wizard-item .progress-label {
    opacity: 0.5;
}

.current-item .progress-count:after {
    background: #fff;
    border: 2px solid #21d4fd;
}

.current-item .progress-count {
    color: #21d4fd;
}

.step-wizard-controls {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px; 
}

#paqueteInput {
   width: 300px;
    margin-bottom: 30px; 
}

    </style>
</head>
<body>
    <section class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Ingresado</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">2</span>
                <span class="progress-label">En almacén origen</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">En tránsito</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">4</span>
                <span class="progress-label">En almacén destino</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">5</span>
                <span class="progress-label">Disponible en pick up</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">6</span>
                <span class="progress-label">En distribución</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">7</span>
                <span class="progress-label">Reagenda entrega</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">8</span>
                <span class="progress-label">Entregado</span>
            </li>
        </ul>
       <div class="step-wizard-controls">
        <input type="text" id="paqueteInput" placeholder="Ingrese el TRACKING del paquete">
        <button class="btn btn-primary" id="avanzarButton">Buscar Tracking</button>
        <p style="min-height: 20px;"></p>
        <td><a href="{{ route('mapa')}}" class="btn btn-primary">Localizar en Mapa</a></td>

    </div>
    </section>

    <script>
        document.getElementById('avanzarButton').addEventListener('click', () => {
            const seguimiento = document.getElementById('paqueteInput').value;

            fetch(`http://127.0.0.1:8002/api/obtenerEstadoPorPaqueteId/${seguimiento}`)
            .then(response => response.json())
            .then(data => {
                avanzarEnBarraDeProgreso(data.estado);
            });
        });

        function avanzarEnBarraDeProgreso(estado) {
            switch (estado) {
                case 'Ingresado':
                    avanzarAPaso(1);
                    break;
                case 'En almacén origen':
                    avanzarAPaso(2);
                    break;
                case 'En tránsito':
                    avanzarAPaso(3);
                    break;
                case 'En almacén destino':
                    avanzarAPaso(4);
                    break;
                case 'Disponible en pick up':
                    avanzarAPaso(5);
                    break;
                case 'En distribución':
                    avanzarAPaso(6);
                    break;
                case 'Reagenda entrega':
                    avanzarAPaso(7);
                    break;
                case 'Entregado':
                    avanzarAPaso(8);
                    break;
                default:
                    console.log('Estado desconocido:', estado);
					
            }
        }

        function avanzarAPaso(paso) {
            const stepItems = document.querySelectorAll('.step-wizard-item');
            stepItems.forEach(item => {
                item.classList.remove('current-item');
            });
            stepItems[paso - 1].classList.add('current-item');
        }
    </script>
</body>
</html>
