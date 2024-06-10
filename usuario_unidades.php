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
            flex-direction: column; /* Para que los elementos estén en columna */
        }

        header {
            width: 100%;
            background-color: #0073b7; /* Azul del encabezado */
            color: white;
            text-align: center;
            padding: 40px 0; /* Aumenta el padding para más espacio */
            font-size: 36px;
            font-weight: bold;
        }

        .button-container {
            display: flex;
            flex-direction: column; /* Para que los botones estén en columna */
            gap: 20px;
            margin-top: 40px; /* Aumenta el margen superior para más espacio */
        }

        button {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
            border: 2px solid black; /* Añade borde negro */
            color: black; /* Color del texto */
            background-color: white; /* Color de fondo blanco */
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #e0e0e0; /* Cambia color de fondo al pasar el ratón */
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <header>
        BIENVENIDO
    </header>
    <div class="button-container">
        <button onclick="window.location.href='gestion_solicitudes.php'">SOLICITUDES</button>
        <button onclick="window.location.href='inventario.html'">INVENTARIO</button>
        <button onclick="window.location.href='informacion_personal.html'">INFORMACION PERSONAL</button>
    </div>
</body>
</html>
