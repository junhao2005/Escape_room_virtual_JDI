<?php
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


// // Respuestas correctas
// $respuestasCorrectas = [
//     "2020",
//     "4 cilindros en línea",
//     "Suspensión de última generación"
// ];

$moto_secreta = array_rand($motos);
$datos_moto = $motos[$moto_secreta];
$imagen_moto = $datos_moto["imagen"];
$pistas = $datos_moto["pistas"];
$pruebas = $datos_moto["pruebas"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuego Interactivo: Adivina la Moto</title>
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
                <p><strong>Tiempo restante:</strong> <span id="tiempo">120</span> segundos</p>
            </div>
            <div class="bmw_pruebas">
                <div class="bmw_prueba" id="prueba1">
                    <p><?php echo $pruebas[0]; ?></p>
                    <input type="text" class="bmw_pruebas_input" id="respuesta1" placeholder="Tu respuesta">
                    <button class="bmw_pruebas_button" onclick="verificarPrueba(1)">Responder</button>
                </div>
                <div class="bmw_prueba" id="prueba2" style="display:none;">
                    <p><?php echo $pruebas[1]; ?></p>
                    <input type="text" class="bmw_pruebas_input" id="respuesta2" placeholder="Tu respuesta">
                    <button class="bmw_pruebas_button" onclick="verificarPrueba(2)">Responder</button>
                </div>
                <div class="bmw_prueba" id="prueba3" style="display:none;">
                    <p><?php echo $pruebas[2]; ?></p>
                    <input type="text" class="bmw_pruebas_input" id="respuesta3" placeholder="Tu respuesta">
                    <button class="bmw_pruebas_button" onclick="verificarPrueba(3)">Responder</button>
                </div>
            </div>
            <div class="bmw_pistas">
                <p id="pista1" class="bmw_pista_oculta"><?php echo $pistas[0]; ?></p>
                <p id="pista2" class="bmw_pista_oculta"><?php echo $pistas[1]; ?></p>
                <p id="pista3" class="bmw_pista_oculta"><?php echo $pistas[2]; ?></p>
            </div>
            <form class="bmw_form_respuesta" id="form-respuesta">
                <label class="bmw_form_respuesta_label" for="respuesta">Introduce el modelo de la moto:</label>
                <input type="text" class="bmw_form_respuesta_input" id="respuesta" name="respuesta" required>
                <button type="submit" class="bmw_form_respuesta_button">Adivinar</button>
            </form>
            <p id="mensaje" class="bmw_mensaje"></p>
        </section>
        <footer class="bmw_footer">
            <p class="bmw_footer_p">&copy; 2025 Escape Room de Motos. Jun Hao, Izan Izquierdo, David Vazquez.</p>
        </footer>
    </div>

    <script>
        // Datos de la moto secreta
        const motoSecreta = "<?php echo $moto_secreta; ?>";
        const respuestasCorrectas = [
            "2021", // Respuesta correcta para la primera pregunta
            "4 cilindros en línea", // Respuesta correcta para la segunda pregunta
            "suspensión electrónica" // Respuesta correcta para la tercera pregunta
        ];

        // Función para verificar las respuestas
        function verificarPrueba(numero) {
            const respuesta = document.getElementById('respuesta' + numero).value.toLowerCase();
            if (respuesta === respuestasCorrectas[numero - 1].toLowerCase()) {
                alert('¡Respuesta correcta!');
                document.getElementById('prueba' + numero).style.display = 'none';
                if (numero < 3) {
                    document.getElementById('prueba' + (numero + 1)).style.display = 'block';
                }
                document.getElementById('pista' + numero).style.display = 'block';
            } else {
                alert('Respuesta incorrecta. Inténtalo de nuevo.');
            }
        }

        // Temporizador
        let tiempoRestante = 120;
        function actualizarTiempo() {
            const tiempoElement = document.getElementById("tiempo");
            tiempoElement.textContent = tiempoRestante;

            if (tiempoRestante === 0) {
                clearInterval(intervaloTiempo);
                alert(`¡Tiempo agotado!`);
                window.location.href = "perdida.php"; // Redirigir al inicio
            }
            tiempoRestante--;
        }
        const intervaloTiempo = setInterval(actualizarTiempo, 1000);
    </script>
</body>
</html>
