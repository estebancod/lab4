
<!DOCTYPE html>
<html>
<head>
    <title>Control de LED</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; 
        }

        .button-container {
            display: flex;
            gap: 20px;
        }

        button {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .on {
            background-color: #4CAF50;
        }

        .off {
            background-color: #F44336;
        }

        button:hover {
            transform: scale(1.1);
        }
    </style>
    <script>
        function enviarComando(comando) {
            fetch(`index.php?estado=${comando}`)
                .then(response => response.text())
                .then(data => {
                    console.log('Respuesta del servidor:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</head>
<body>
    <div class="button-container">
        <button class="on" onclick="enviarComando('ON')">ON</button>
        <button class="off" onclick="enviarComando('OFF')">OFF</button>
    </div>
</body>
</html>

<?php
$estadoArchivo = 'estado_led.txt';

// Comprobar si el archivo existe, si no, crear uno con estado "OFF"
if (!file_exists($estadoArchivo)) {
    file_put_contents($estadoArchivo, 'OFF');

}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    // Guardar el estado en un archivo (o base de datos)
    file_put_contents($estadoArchivo, $estado); //manda el ON o OFF en la pagina

    // Enviar respuesta
    //echo $estado;
    exit();
}

// Leer el estado actual del LED
$estadoActual = file_get_contents($estadoArchivo);
// Solo imprimir la respuesta, no el contenido HTML
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //echo $estadoActual;

    exit();
}

?>