<?php
include("controlador/conexion.php");

$codigo = $_REQUEST['codigo'];

$sql = "SELECT * FROM usuariof WHERE codigo = '$codigo'";
$query = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #3498db;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 5000px;
            /* Aumentado a 700px (aprox. 3cm más ancho que la imagen) */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px 70px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 80px;
            color: #007bff;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 10px 30px;
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="card">
            <?php include("controlador/editar_persona.php");
            ?>
            <form method="POST" action="controlador/editar_persona.php">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="codigo" value="<?php echo $fila['codigo']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre'] ?>" aria-describedby="nombreHelp">
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $fila['cargo'] ?>" aria-describedby="cargo" >
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>