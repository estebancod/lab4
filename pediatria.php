<!DOCTYPE html>
<html>
<head>
    <title>Sección Pediatría</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        h1 {
            background-color: #0073b7;
            color: white;
            padding: 20px;
            margin: 0;
            text-align: center;
            width: 100%;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0073b7;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button-container {
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
        }

        #send-button {
            background-color: grey;
            color: white;
            border: none;
            cursor: not-allowed;
        }

        #validate-button {
            background-color: #0073b7;
            color: white;
            border: none;
        }
    </style>
    <script>
        function validate() {
            alert('Validado para pediatría');
            document.getElementById('send-button').style.backgroundColor = '#0073b7';
            document.getElementById('send-button').style.cursor = 'pointer';
            document.getElementById('send-button').disabled = false;
        }

        function send() {
            alert('Enviado con éxito');
        }
    </script>
</head>
<body>
    <h1>SECCIÓN PEDIATRÍA</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de caducidad</th>
                <th>Cantidad requerida</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Enterogermina</td>
                <td>líquido</td>
                <td>2026-03-04</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Ibuprofeno</td>
                <td>pastilla</td>
                <td>2024-03-31</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Paracetamol</td>
                <td>pastilla</td>
                <td>2024-06-22</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Salbutamol</td>
                <td>líquido</td>
                <td>2024-03-02</td>
                <td>3</td>
            </tr>
        </tbody>
    </table>
    <div class="button-container">
        <button id="validate-button" onclick="validate()">Validar</button>
        <button id="send-button" onclick="send()" disabled>Enviar</button>
    </div>
</body>
</html>
