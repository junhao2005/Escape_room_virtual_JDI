<?php
$respuestasCorrectas = [
    1 => "1998",
    2 => "4 cilindros en linea",
    3 => "Suspension invertida"
];

$numero = $_POST['numero'];
$respuesta = $_POST['respuesta'];

if ($respuesta === $respuestasCorrectas[$numero]) {
    echo json_encode(['correcto' => true]);
} else {
    echo json_encode(['correcto' => false]);
}
?>
