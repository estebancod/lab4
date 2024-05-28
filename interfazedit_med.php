<!DOCTYPE html>
<html lang="en">
<?php
include("controlador/conexion_med.php");

$id = $_REQUEST['inputid'];

$sql = "SELECT * FROM medicamentos WHERE identificacion = '$id'";
$query = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_array($query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedRed Express - Editar medicamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3498db;
            color: #ffffff;
            padding: 20px;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            max-width: 150px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <img src="images/WhatsApp Image 2024-05-03 at 9.21.36 AM.jpeg" alt="Logo" class="logo">
    <h1 class="text-center mb-4">EDITAR INFORMACIÓN MEDICAMENTO</h1>

    <div class="card">
        <?php include("controlador/editar_medicamento.php");
        ?>
        <form method="POST" action="controlador/editar_medicamento.php">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="inputid" value="<?php echo $fila['identificacion']; ?>">
            </div>
            <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="<?php echo $fila['nombre'] ?>" aria-describedby="nombreHelp" >
            </div>
            <div class="mb-3">
                <label for="inputFormaFarmaceutica" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="inputFormaFarmaceutica" name="inputFormaFarmaceutica" value="<?php echo $fila['descripcion'] ?>" aria-describedby="formaFarmaceuticaHelp" placeholder="Ingrese la forma farmacéutica" required>
            </div>
            <div class="mb-3">
                <label for="inputFechaCaducidad" class="form-label">Fecha de Caducidad</label>
                <input type="date" class="form-control" id="inputFechaCaducidad" name="inputFechaCaducidad" value="<?php echo $fila['fecha_caducidad'] ?>" aria-describedby="fechaCaducidadHelp" placeholder="Ingrese la fecha de caducidad" required>
            </div>
            <div class="mb-3">
                <label for="inputCantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="inputCantidad" name="inputCantidad" value="<?php echo $fila['cantidad'] ?>" aria-describedby="cantidadHelp" placeholder="Ingrese la cantidad" required>
            </div>
            <div class="mb-3">
                <label for="inputLote" class="form-label">Lote</label>
                <input type="text" class="form-control" id="inputLote" name="inputLote" value="<?php echo $fila['lote'] ?>" aria-describedby="loteHelp" placeholder="Ingrese el número de referencia del lote" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="medicamentos_boots.php" class="btn btn-secondary">Regresar</button>
        </form>
    </div>
</body>

</html>