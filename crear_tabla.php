<?php
$host = "dpg-d1914svfte5s73bssih0-a";
$port = "5432";
$dbname = "usabilidad";
$user = "usabilidad_user";
$password = "8Ph17wtTdgXZrJPnJLuOCA3H1KKN2HIh";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS resultados (
        id SERIAL PRIMARY KEY,
        funcion TEXT,
        codigo TEXT,
        completado BOOLEAN,
        tiempo INT,
        observaciones TEXT
    )";

    $conn->exec($sql);
    echo "<h3>✅ Tabla 'resultados' creada correctamente.</h3>";

} catch (PDOException $e) {
    echo "<h3>❌ Error: " . $e->getMessage() . "</h3>";
}
?>
