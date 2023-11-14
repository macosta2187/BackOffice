<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chart-container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    </style>
</head>

<body>
<div class="container text-center">
        <h1 class="my-5">Paquetes en (Estado: Entregado)</h1>
        
</div>

    <div class="container ">
  
        <div class="row justify-content-center">
            <div class="col-lg-8 chart-container"> 
                <canvas id="graficoBarras" style="width: 100%; height: 400px;"></canvas> 
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("graficoBarras").getContext("2d");

    var datosPaquetes = @json($resultados->pluck('cantidad')); 
    var meses = @json($resultados->pluck('mes'));

    
    var nombresMeses = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];

    
    var etiquetas = meses.map(function (mes) {
        return nombresMeses[mes - 1];
    });

    var config = {
        type: "bar",
        data: {
            labels: etiquetas,
            datasets: [
                {
                    label: "Paquetes Entregados",
                    data: datosPaquetes,
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    };

    new Chart(ctx, config);
});
    </script>
</body>
</html>
