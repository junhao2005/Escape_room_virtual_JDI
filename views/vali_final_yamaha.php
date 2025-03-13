<?php
$moto_secreta = "Yamaha YZF-R1"; // La respuesta correcta

$respuestaFinal = $_POST['respuestaFinal'];

if (strcasecmp($respuestaFinal, $moto_secreta) == 0) {
    header("Location: ducati.php");
    exit();
} else {
    header("Location: ./perdida.php");
    exit();
}
?>
