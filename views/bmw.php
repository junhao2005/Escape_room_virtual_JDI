<?php
session_start();

if (empty($_SESSION['ducati_completado'])) {
    header('Location: ducati.php'); // Redirigir al nivel anterior (Ducati)
    exit();
}

// Lista de motos con pistas y pruebas
$motos = [
    "BMW M1000RR" => [
        "imagen" => "img/M1000RR.png",
        "pistas" => [
            "Esta moto fue lanzada en 2021 y representa la versión más deportiva de BMW en el segmento de las superbikes.",
            "Cuenta con un motor de 4 cilindros en línea de 999 cc, con una potencia de 205 caballos.",
            "Esta moto destaca por su aerodinámica y la suspensión electrónica, lo que la hace ideal para pista."
        ],
        "pruebas" => [
            "¿En qué año se lanzó una de las motos deportivas más avanzadas de BMW, conocida por su enfoque en las superbikes?",
            "¿Qué tipo de motor tiene esta moto, que es conocida por su potencia y eficiencia?",
            "¿Qué tipo de suspensión utiliza esta moto de BMW para mejorar el rendimiento en pistas?"
        ]
    ]
];

// Inicializar sesión para el progreso del juego
if (!isset($_SESSION['moto_secreta'])) {
    $moto_secreta = array_rand($motos);
    $_SESSION['moto_secreta'] = $moto_secreta;
    $_SESSION['pregunta_actual'] = 0;
    $_SESSION['fallos'] = 0;
    $_SESSION['pistas_mostradas'] = 0;
    $_SESSION['respuesta_final_correcta'] = false; // Estado de la última pregunta
}

$moto_secreta = $_SESSION['moto_secreta'];
$datos_moto = $motos[$moto_secreta];
$pistas = $datos_moto['pistas'];
$pruebas = $datos_moto['pruebas'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina la Moto</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bmw_body">
    <div class="bmw_container">
        <header class="bmw_header">
            <h1>BMW</h1>
            <p>¡Resuelve las pruebas para desbloquear pistas y adivinar la moto!</p>
        </header>
        <section class="bmw_game">
            <div class="bmw_game_info">
                <p><strong>Intentos fallidos:</strong> <span id="fallos"><?php echo $_SESSION['fallos']; ?></span></p>
            </div>
            <?php if ($_SESSION['pregunta_actual'] < count($pruebas)): ?>
                <!-- Mostrar preguntas progresivamente -->
                <div class="bmw_pruebas">
                    <form action="validacion_bmw.php" method="post">
                        <div class="bmw_prueba">
                            <p><?php echo $pruebas[$_SESSION['pregunta_actual']]; ?></p>
                            <input type="text" name="respuesta" placeholder="Tu respuesta" class="bmw_pruebas_input">
                            <button type="submit" class="bmw_pruebas_button">Responder</button>
                        </div>
                    </form>
                </div>
                <div class="bmw_pistas">
                    <?php for ($i = 0; $i < $_SESSION['pistas_mostradas']; $i++): ?>
                        <p class="bmw_pista"><?php echo $pistas[$i]; ?></p>
                    <?php endfor; ?>
                </div>
            <?php elseif (!$_SESSION['respuesta_final_correcta']): ?>
                <!-- Mostrar la pregunta final -->
                <div class="bmw_final">
                    <form action="validacion_bmw.php" method="post">
                        <p>¡Última pregunta! ¿Cuál es el modelo de esta moto?</p>
                        <input type="text" name="respuesta_final" placeholder="Tu respuesta final" class="bmw_form_respuesta_input">
                        <button type="submit" class="bmw_form_respuesta_button">Adivinar</button>
                    </form>
                </div>
            <?php endif; ?>
        </section>
        <footer class="bmw_footer">
            <p>&copy; 2025 Escape Room de Motos. Jun Hao, Izan Izquierdo, David Vazquez.</p>
        </footer>
    </div>
</body>
</html>
