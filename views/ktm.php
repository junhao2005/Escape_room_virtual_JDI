<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Adivina la Moto</title>
</head>
<body class="ktm-body">
    <div id="container" class="ktm-container">
        <h2 class="ktm-title">KTM</h2>
        <p class="ktm-hint">Pista: Esta moto es una máquina potente y ligera diseñada para el enduro, con un sistema de inyección directa de combustible. ¿Cuál es?</p>

        <form method="post" action="validacion_ktm.php">
            <input type="text" name="moto" placeholder="Ingresa el nombre de la moto" required class="ktm-input">
            <button type="submit" class="ktm-btn">Enviar</button>
        </form>

        <p id="message"></p>

        <?php
        session_start();
        if (isset($_SESSION['error_mensaje'])) {
            echo '<div class="ktm-error-msg">' . $_SESSION['error_mensaje'] . '</div>';
            unset($_SESSION['error_mensaje']); // Se borra después de mostrarlo
        }
        ?>

        <!-- <img src="../img/moto_gif.gif" alt="Moto en acción" class="ktm-gif-moto"> -->
    </div>
</body>
</html>
