<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Prueba</title>
    <script>
        function toggleObservaciones(checkbox, textareaId) {
            document.getElementById(textareaId).disabled = !checkbox.checked;
        }
    </script>
</head>
<body>
    <h2>Formulario de Prueba</h2>
    <form action="guardar.php" method="POST">
        <?php
        $funciones = [
            ["CU01.1", "Registrar cuenta"],
            ["CU01.2", "Verificar cuenta"],
            ["CU03.2", "Crear hábito"],
            ["CU03.3", "Editar hábito"],
            ["CU06.1", "Registrar emoción"],
            ["CU05.4.1", "Configurar notificación de hábito"],
            ["CU05.3", "Conectar reloj inteligente"],
            ["CU07", "Cerrar sesión"]
        ];

        foreach ($funciones as $index => [$codigo, $nombre]) {
            echo "
            <fieldset style='margin-bottom: 20px;'>
                <legend><strong>$nombre ($codigo)</strong></legend>
                ¿Se completó con éxito?
                <input type='checkbox' name='completado[$index]' value='1' onchange=\"toggleObservaciones(this, 'obs_$index')\">
                <br>
                Tiempo (minutos): <input type='number' name='tiempo[$index]' min='0'>
                <br>
                Observaciones: <br>
                <textarea name='observaciones[$index]' id='obs_$index' disabled style='width: 100%; height: 60px;'></textarea>
                <input type='hidden' name='funcion[$index]' value='$nombre'>
                <input type='hidden' name='codigo[$index]' value='$codigo'>
            </fieldset>
            ";
        }
        ?>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
