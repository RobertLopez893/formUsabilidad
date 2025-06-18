<?php
include "conexion.php";

$funciones = $_POST['funcion'];
$codigos = $_POST['codigo'];
$completados = $_POST['completado'] ?? [];
$tiempos = $_POST['tiempo'];
$observaciones = $_POST['observaciones'];

for ($i = 0; $i < count($funciones); $i++) {
    $funcion = $funciones[$i];
    $codigo = $codigos[$i];
    $completado = isset($completados[$i]) ? 1 : 0;
    $tiempo = intval($tiempos[$i]);
    $obs = $observaciones[$i];

    $stmt = $conn->prepare("INSERT INTO resultados (funcion, codigo, completado, tiempo, observaciones)
                            VALUES (:funcion, :codigo, :completado, :tiempo, :observaciones)");
    $stmt->execute([
        ':funcion' => "$funcion ($codigo)",
        ':codigo' => $codigo,
        ':completado' => $completado,
        ':tiempo' => $tiempo,
        ':observaciones' => $obs
    ]);
}

echo "✅ Datos guardados correctamente. <a href='index.php'>Volver</a>";
?>
