<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pistas iniciales
$pistas = [
    "Pista 1: Tiene un motor V4 de 1103 cc.",
    "Pista 2: Es conocida por su diseño aerodinámico y su uso en competiciones.",
    "Pista 3: Su velocidad máxima supera los 300 km/h."
];

// Respuestas correctas
$respuesta_correcta = "panigale v4 s";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["seleccionar_tipo"])) {
        if (!empty($_POST["tipo_moto"])) {
            $_SESSION['tipo_moto'] = $_POST["tipo_moto"];
            $mensaje = "Tipo de moto seleccionado correctamente.";
        } else {
            $mensaje = "Selecciona al menos un tipo de moto.";
        }
    } else {
        if ($_SESSION['tipo_moto'] == "") {
            $mensaje = "Selecciona el tipo de moto primero.";
        } else {
            $respuesta_usuario = strtolower(trim($_POST["respuesta"]));

            if ($respuesta_usuario == strtolower($respuesta_correcta)) {
                $_SESSION['ducati_completado'] = true; // Marca el nivel Ducati como completado
                header('Location: bmw.php'); // Redirige al siguiente nivel (BMW)
                exit();
            } else {
                $_SESSION['intentos']++;
                $_SESSION['pista_actual'] = min($_SESSION['intentos'], count($pistas) - 1);
                if ($_SESSION['intentos'] >= 3) {
                    header("Location: perdida.php");
                    exit();
                }
                $mensaje = "Respuesta incorrecta. Inténtalo de nuevo.";
            }
        }
    }
}
?>
