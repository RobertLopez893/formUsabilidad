<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Estadísticas de Funciones Evaluadas</h2>
    <canvas id="chart" width="700" height="400"></canvas>
    <?php
    $stmt = $conn->query("SELECT funcion, COUNT(*) as total, SUM(completado::int) as exitosas FROM resultados GROUP BY funcion");
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $labels = [];
    $exitos = [];

    foreach ($datos as $row) {
        $labels[] = $row['funcion'];
        $exitos[] = $row['exitosas'];
    }
    ?>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Completadas con Éxito',
                    data: <?= json_encode($exitos) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            }
        });
    </script>
    <br>
    <a href="agregar.php">Agregar prueba</a>
</body>
</html>
