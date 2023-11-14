<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidar</title>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        #map {
            height: 600px;
            width: 100%;
        }

        #info-panel {
    background-color: #fff;
    opacity: 0.8;
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    padding: 20px;
    width: 400px; /* Ancho fijo */
    max-width: 90vw; /* Ancho máximo relativo al 90% del ancho de la ventana */
    max-height: 80vh; /* Altura máxima relativa al 80% de la altura de la ventana */
    overflow-y: auto; /* Agregar desplazamiento vertical si el contenido excede la altura máxima */
    border: 1px solid #ddd;
}



        body {
            overflow-x: hidden; /* Evitar la barra de desplazamiento horizontal */
        }

    </style>
</head>
<body>
<div class="container text-center">
    <h1 class="my-5">Buscador</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <label for="searchId">ID del paquete a buscar:</label>
            <input type="number" id="searchId" class="form-control" min="1">
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label>
            <button class="btn btn-info form-control" id="searchBtn">Buscar</button>
        </div>
    </div>


    <div class="container">
        
            <h1 class="mt-5">Paquetes en viaje en tiempo real</h1>
        </div>
        <table class="table table-dark" id="paquetes-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="paquetes-list"></tbody>
        </table>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTr31fxAnH9k082v-SDX4a9HZuAnubZpM&callback&callback=initMap" async defer></script>

    <div class="container">
        <h1 class="mt-5">Viaje a destino</h1>
        <div id="map" class="mt-4"></div>
        
        </div>
    </div>


<div class="container">
    
    <div id="map" class="mt-4"></div>
    <div id="info-panel" class="mt-3">
        <strong>Distancia: </strong><span id="distance"></span><br>
        <strong>Ruta: </strong><span id="route"></span><br>
        <strong>Tiempo: </strong><span id="time"></span>
    </div>
</div>

		
		
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.9011, lng: -56.1645 },
                zoom: 13
            });

            document.getElementById('searchBtn').addEventListener('click', function () {
                const searchId = document.getElementById('searchId').value;

                
                fetch(`http://127.0.0.1:8002/api/listar-rutas/${searchId}`)

                    .then(response => response.json())
                    .then(data => {
                        var origen = new google.maps.LatLng(data.origen.latitud, data.origen.longitud);
                        var destino = new google.maps.LatLng(data.destino.latitud, data.destino.longitud);

                        var origenMarker = new google.maps.Marker({
                            position: origen,
                            map: map,
                            title: data.origen.nombre
                        });

                        var destinoMarker = new google.maps.Marker({
                            position: destino,
                            map: map,
                            title: data.destino.nombre
                        });

                        var request = {
                            origin: origen,
                            destination: destino,
                            travelMode: 'DRIVING'
                        };

                        var directionsService = new google.maps.DirectionsService();
                        var directionsDisplay = new google.maps.DirectionsRenderer();

                        directionsDisplay.setMap(map);

                        directionsService.route(request, function(response, status) {
                            if (status === 'OK') {
                                directionsDisplay.setDirections(response);

                                var route = response.routes[0].legs[0];
                                var distance = route.distance.text;
                                var routeText = route.start_address + ' - ' + route.end_address;
                                var time = route.duration.text;

                                document.getElementById('distance').textContent = distance;
                                document.getElementById('route').textContent = routeText;
                                document.getElementById('time').textContent = time;
                            } else {
                                console.log('Error al obtener la ruta:', status);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error al obtener la información de la ruta:', error);
                    });
            });

            fetch('http://127.0.0.1:8002/api/paquetes-en-transito') 
                .then(response => response.json())
                .then(data => {
                    const paquetesList = document.getElementById('paquetes-list');
                    data.forEach(paquete => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${paquete.id}</td>
                            <td>${paquete.departamento}</td>
                            <td>${paquete.descripcion}</td>
                            <td>${paquete.estado}</td>
                        `;
                        paquetesList.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error al obtener la lista de paquetes:', error);
                });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
