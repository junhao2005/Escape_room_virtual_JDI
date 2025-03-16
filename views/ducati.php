<?php
session_start();
include 'validacion_ducati.php';

// Inicializar variables
if (!isset($_SESSION['pista_actual'])) {
    $_SESSION['pista_actual'] = 0;
    $_SESSION['intentos'] = 0;
    $_SESSION['tipo_moto'] = "";
}
if (!isset($mensaje)) {
    $mensaje = "";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina la Moto</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="minijuego-container">
        <header class="minijuego-header">
            <h1>Ducati</h1>
            <img src="../img/Ducati.png" alt="" width="200">
            <p>Responde las preguntas para desbloquear pistas y resolver el acertijo.</p>
        </header>
        <section class="minijuego-intro">
            <h2>Selecciona el tipo de moto</h2>
            <form class="minijuego-form" method="POST" action="">
                <label>
                    <input type="checkbox" name="tipo_moto" value="deportiva" <?php echo ($_SESSION['tipo_moto'] == "deportiva") ? 'checked' : ''; ?>> Deportiva
                </label>
                <label>
                    <input type="checkbox" name="tipo_moto" value="naked" <?php echo ($_SESSION['tipo_moto'] == "naked") ? 'checked' : ''; ?>> Naked
                </label>
                <label>
                    <input type="checkbox" name="tipo_moto" value="scooter" <?php echo ($_SESSION['tipo_moto'] == "scooter") ? 'checked' : ''; ?>> Scooter
                </label>
                <button type="submit" name="seleccionar_tipo">Seleccionar</button>
            </form>
            
            <?php if ($_SESSION['tipo_moto']): ?>
                <h2>Pista Actual</h2>
                <p class="minijuego-pista"><?php echo $pistas[$_SESSION['pista_actual']]; ?></p>
                <form class="minijuego-form" method="POST" action="">
                    <label for="respuesta">Tu respuesta:</label>
                    <input type="text" id="respuesta" name="respuesta" required>
                    <button type="submit">Enviar</button>
                </form>
            <?php endif; ?>
            
            <p class="minijuego-mensaje"><?php echo $mensaje; ?></p>
        </section>
        <footer>
            <p>&copy; 2025 Escape Room de Motos. Jung Hao, Izan Izquierdo, David Vazquez.</p>
        </footer>
    </div>
</body>
</html>
