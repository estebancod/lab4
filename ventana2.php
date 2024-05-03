ini_set('display_errors', 1);
error_reporting(E_ALL); 


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
            background-color: #3498db; /* Azul más claro */
            padding: 20px;
            text-align: center;
            color: #ffffff;
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
            background-color: #3498db; /* Azul más claro */
            color: #ffffff;
        }
        .bg-light-blue {
            background-color: #e6f2ff; /* Azul claro */
        }
        .btn-blue {
            background-color: #3498db; /* Azul más claro */
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="bi bi-gear-fill"></i> Interfaz de Administrador</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <div class="content">
                    <h3 class="text-center bg-blue text-white rounded-top p-2">Registrar Persona</h3>
                    
                    <form method="POST">
                    <?php
                      include "modelo/conexion.php";
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
                            <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingresa tu puesto">
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
                            include "modelo/conexion.php";
                            $sql=$conexion->query("select * from usuariof");
                            while($datos=$sql->fetch_object()){ ?>
                                <tr>
                                   <td><?=$datos->codigo?></td>
                                   <td><?=$datos->nombre?></td>
                                   <td><?=$datos->cargo?></td>
                                    <td>
                                    <button class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                             <?php }
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
