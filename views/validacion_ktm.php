<?php
session_start();


$moto = $_POST['moto'];

if (empty($moto)) {
    $_SESSION['error_mensaje'] = "El campo es obligatorio. Por favor, inténtelo de nuevo.";
    header('Location: ktm.php');
    exit();
} elseif (strtolower($moto) == 'ktm 300 tpi') {
    $_SESSION['reto_ktm'] = true;
    $_SESSION['intentos_ktm'] = 0; // Reiniciar los intentos si la respuesta es correcta
    $_SESSION['ktm_completado'] = true; // Marca el nivel KTM como completado
    header('Location: yamaha.php'); // Redirige al siguiente nivel (Yamaha)
    exit();
} else {
    if (!isset($_SESSION['intentos_ktm'])) {
        $_SESSION['intentos_ktm'] = 1;
    } else {
        $_SESSION['intentos_ktm']++;
    }

    if ($_SESSION['intentos_ktm'] == 1) {
        $_SESSION['error_mensaje'] = "Datos incorrectos. Pista 1: Es una moto austriaca.";
    } elseif ($_SESSION['intentos_ktm'] == 2) {
        $_SESSION['error_mensaje'] = "Datos incorrectos. Pista 2: Es una moto de la serie EXC.";
    } elseif ($_SESSION['intentos_ktm'] == 3) {
        $_SESSION['error_mensaje'] = "Datos incorrectos. Pista 3: El modelo es 300 TPI.";
    } else {
        $_SESSION['error_mensaje'] = "Lo siento, has alcanzado el límite de intentos.";
        header('Location: perdida.php'); // Redirigir a la página de pérdida
        exit();
    }

    header('Location: ktm.php');
    exit();
}


?>
