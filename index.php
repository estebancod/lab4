
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007bff; /* Fondo azul para todo el body */
            color: #000000; /* Color de texto blanco */
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura total de la ventana */
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN</h2>
        <form id="loginForm" action="process_login.php" method="POST">
            <div class="form-group">
                <label for="username">Nombre:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userID">ID de Usuario:</label>
                <input type="text" id="userID" name="userID" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" id="submitButton">Ingresar</button>
        </form>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            // Evitar el envío del formulario por defecto
            event.preventDefault();



           // Obtener el valor del campo de ID de Usuario
           var userIDValue = document.getElementById('userID').value;

            // Redirigir según el valor del campo de ID de Usuario
             if (userIDValue === '1') {
               window.location.href = 'ventana.php';
            } else if (userIDValue === '2') {
              window.location.href = 'ventana2.php';
            } else {
    // Manejar otro caso si es necesario
    alert('ID de usuario no válido');
}
        });
    </script>



    

</body>
</html>