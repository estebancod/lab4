<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .bg-primary {
        background-color: #3498db !important;
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

    .bg-blue {
        background-color: #3498db;
        color: #ffffff;
    }

    .bg-light-blue {
        background-color: #e6f2ff;
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
</style>

<body>
    <div class="header">
        <img src="images/WhatsApp Image 2024-05-03 at 9.21.36 AM.jpeg" alt="Logo" class="logo">
        <h1 class="title"><i class="bi bi-gear-fill"></i> Gestión de Inventario</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="content">
                    <h3 class="text-center bg-blue text-white rounded-top p-2">Registrar Medicamento</h3>

                    <?php include("controlador/conexion_med.php");
                    ?>
                    <form method="POST" action="controlador/insertar_medicamento.php">
                        <div class="form-group">
                            <label for="inputid" class="form-label">Identificación*</label>
                            <input type="text" class="form-control" id="inputid" name="inputid" aria-describedby="idHelp" placeholder="Ingrese el código de identificación" required pattern="^[a-zA-Z0-9]+$" title="Ingrese un código alfanumérico">
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="form-label">Nombre*</label>
                            <input type="text" class="form-control" id="inputNombre" name="inputNombre" aria-describedby="nombreHelp" placeholder="Ingrese el nombre" required pattern="^[a-zA-Z\s]+$" title="Ingrese solo letras y espacios">
                        </div>
                        <div class="form-group">
                            <label for="inputFormaFarmaceutica" class="form-label">Descripción*</label>
                            <input type="text" class="form-control" id="inputFormaFarmaceutica" name="inputFormaFarmaceutica" aria-describedby="formaFarmaceuticaHelp" placeholder="Ingrese la forma farmacéutica" required>
                        </div>
                        <div class="form-group">
                            <label for="inputFechaCaducidad" class="form-label">Fecha de Caducidad*</label>
                            <input type="date" class="form-control" id="inputFechaCaducidad" name="inputFechaCaducidad" aria-describedby="fechaCaducidadHelp" placeholder="Ingrese la fecha de caducidad" required>
                        </div>
                        <div class="form-group">
                            <label for="inputCantidad" class="form-label">Cantidad*</label>
                            <input type="number" class="form-control" id="inputCantidad" name="inputCantidad" aria-describedby="cantidadHelp" placeholder="Ingrese la cantidad" required min="1" title="Ingrese un número mayor o igual a 1">
                        </div>
                        <div class="form-group">
                            <label for="inputLote" class="form-label">Lote*</label>
                            <input type="text" class="form-control" id="inputLote" name="inputLote" aria-describedby="loteHelp" placeholder="Ingrese el número de referencia del lote" required pattern="^[a-zA-Z0-9]+$" title="Ingrese un código alfanumérico">
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
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha de caducidad</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Lote</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("controlador/conexion_med.php");
                            $sql = "SELECT * FROM medicamentos";
                            $query = mysqli_query($conexion, $sql);

                            while ($fila = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $fila['identificacion'] ?></th>
                                    <th scope="row"><?php echo $fila['nombre'] ?></th>
                                    <th scope="row"><?php echo $fila['descripcion'] ?></th>
                                    <th scope="row"><?php echo $fila['fecha_caducidad'] ?></th>
                                    <th scope="row"><?php echo $fila['cantidad'] ?></th>
                                    <th scope="row"><?php echo $fila['lote'] ?></th>
                                    <th scope="row">
                                        <a href="interfazedit_med.php?inputid=<?php echo $fila['identificacion'] ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="controlador/eliminar_medicamento.php?inputid=<?php echo $fila['identificacion'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                    </th>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>