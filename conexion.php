<?php
$host = "dpg-d1914svfte5s73bssih0-a";      // lo copias de Internal Database URL
$port = "5432";                    // siempre es ese puerto
$dbname = "usabilidad";              // o el que tú hayas puesto
$user = "usabilidad_user";
$password = "8Ph17wtTdgXZrJPnJLuOCA3H1KKN2HIh";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>