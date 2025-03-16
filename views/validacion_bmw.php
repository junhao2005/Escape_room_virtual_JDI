<?php
session_start();

$respuestas_correctas = [
    "2021",
    "4 cilindros en línea",
    "suspensión electrónica"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['respuesta_final'])) {
        // Validar la última respuesta (modelo de la moto)
        $respuesta_usuario = strtolower(trim($_POST['respuesta_final']));
        if ($respuesta_usuario === "m1000rr") {
            $_SESSION['bmw_completado'] = true; // Marca el nivel BMW como completado
            header('Location: final.php'); // Redirige al nivel final
            exit();
                        exit();
        } else {
            $_SESSION['fallos']++;
            if ($_SESSION['fallos'] >= 3) {
                header('Location: perdida.php'); // Redirigir a pantalla de fallo
                exit();
            }
        }
    } elseif (isset($_POST['respuesta'])) {
        // Validar respuestas regulares
        $respuesta_usuario = strtolower(trim($_POST['respuesta']));
        $pregunta_actual = $_SESSION['pregunta_actual'];
        $fallos = $_SESSION['fallos'];

        if ($respuesta_usuario === strtolower($respuestas_correctas[$pregunta_actual])) {
            // Respuesta correcta
            $_SESSION['pregunta_actual']++;
            $_SESSION['pistas_mostradas']++;
        } else {
            // Respuesta incorrecta
            $_SESSION['fallos']++;
            if ($_SESSION['fallos'] >= 3) {
                header('Location: perdida.php'); // Redirigir a pantalla de fallo
                exit();
            }
        }
    }

    // Redirigir de vuelta al juego
    header('Location: bmw.php');
    exit();
}
