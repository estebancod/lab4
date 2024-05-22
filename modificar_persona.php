<?php 
include "controlador/modificar_persona.php";
include "modelo/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("select * from usuariof where codigo=$id ");
echo $id;

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
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 5000px; /* Aumentado a 700px (aprox. 3cm más ancho que la imagen) */
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
            <div class="card-header">Modificar Usuario</div>
            <div class="card-body">
                <form>
                
                <?php

                    include "controlador/modificar_persona.php";
                    //include "modelo/conexion.php";
                    //$sql=$conexion->query("select * from usuariof");
                    //$sql=$conexion->query("select * from usuariof where codigo=$id ");
                    while($datos = $sql->fetch_object()){?>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre"  value="<?= $datos->nombre ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="number" class="form-control" name="codigo" placeholder="Ingresa tu código" value="<?= $datos->codigo ?>">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="text" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña" value="<?= $datos->contraseña ?>">
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto</label>
                        <input type="text" class="form-control" name="puesto" placeholder="Ingresa tu puesto" value="<?= $datos->cargo ?>">
                    </div>

                    <?php }

                ?>
                    
                    <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>