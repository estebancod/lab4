<!DOCTYPE html>
<html>
<head>
    <title>Control del sistema</title>
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
        function enviarEstado(estado) {
            fetch('enviar.php?estado=' + estado)
                .then(response => response.text())
                .then(data => console.log(data))
                .catch(error => console.error(error));
        }

        function setEstado(valor) {
            enviarEstado(valor);
        }
    </script>
</head>
<body>
    <div class="button-container">
        <button class="on" onclick="setEstado('ON')">ON</button>
        <button class="off" onclick="setEstado('OFF')">OFF</button>
    </div>
</body>
</html>

<?php
$estadoArchivo = 'estado_sistema.txt';

// Comprobar si se recibió el parámetro "estado" en la URL
if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];

    // Guardar el estado en el archivo
    file_put_contents($estadoArchivo, $estado);

    // Enviar una respuesta al cliente
    echo "Estado guardado: " . $estado;
} else {
    //echo "No se recibió el estado.";
}
?>