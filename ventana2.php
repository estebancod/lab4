<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #3498db;
            padding: 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            height: 50px;
        }

        .title {
            text-align: center;
            flex-grow: 1;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .bg-blue {
            background-color: #3498db;
            color: #ffffff;
        }

        .bg-light-blue {
            background-color: #e6f2ff;
        }

        .btn-blue {
            background-color: #3498db;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="images/WhatsApp Image 2024-05-03 at 9.21.36 AM.jpeg" alt="Logo" class="logo">
        <h1 class="title"><i class="bi bi-gear-fill"></i> Gestión de usuarios</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="content">
                    <h3 class="text-center bg-blue text-white rounded-top p-2">Registrar Persona</h3>

                    <form method="POST">
                        <?php
                        include "controlador/registro_persona.php";
                        ?>
                        <div class="form-group">
                            <label for="nombre"><i class="bi bi-person-fill"></i> Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="codigo"><i class="bi bi-hash"></i> Código</label>
                            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Ingresa tu código">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="bi bi-lock-fill"></i> Contraseña</label>
                            <input type="text" class="form-control" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña">
                        </div>
                        <div class="form-group">
                            <label for="cargo"><i class="bi bi-briefcase-fill"></i> Puesto</label>
                            <select class="form-control" id="cargo" name="cargo">
                                <option value="">Selecciona tu puesto</option>
                                <option value="unidades">Unidad</option>
                                <option value="farmacia">Farmacia</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="content">
                    <h3 class="text-center bg-blue text-white rounded-top p-2">Lista de Personas</h3>
                    <table class="table table-striped">
                        <thead class="bg-light-blue">
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            include("controlador/conexion.php");
                            $sql = "SELECT * FROM usuariof";
                            $query = mysqli_query($conexion, $sql);

                            while ($fila = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $contador; ?></th>
                                    <th scope="row"><?php echo $fila['codigo'] ?></th>
                                    <th scope="row"><?php echo $fila['nombre'] ?></th>
                                    <th scope="row"><?php echo $fila['cargo'] ?></th>
                                    <th scope="row">
                                        <a href="modificar_persona.php?codigo=<?php echo $fila['codigo'] ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="controlador/eliminar_persona.php?codigo=<?php echo $fila['codigo'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                    </th>
                                </tr>
                            <?php
                                $contador++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>