<?php
$host = "localhost";
$user = "root"; // o tu usuario de MySQL
$pass = "";     // tu contraseña
$db = "usabilidad";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
