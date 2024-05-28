<?php
// Incluye el archivo de conexión
include("conexion_med.php");

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $identificacion = $_POST["inputid"];
    $nombre = $_POST["inputNombre"];
    $descripcion = $_POST["inputFormaFarmaceutica"];
    $fechaCaducidad = $_POST["inputFechaCaducidad"];
    $cantidad = $_POST["inputCantidad"];
    $lote = $_POST["inputLote"];

    // Prepara la consulta SQL para verificar si la identificación ya existe
    $sql_check = "SELECT * FROM medicamentos WHERE identificacion = '$identificacion'";
    $result_check = $conexion->query($sql_check);

    if ($result_check->num_rows > 0) {
        // La identificación ya existe, muestra un mensaje de error o toma alguna acción
        echo "Error: La identificación ingresada ya existe.";
    } else {
        // La identificación no existe, procede a insertar el nuevo registro
        $sql = "INSERT INTO medicamentos (identificacion, nombre, descripcion, fecha_caducidad, cantidad, lote) 
        VALUES ('$identificacion', '$nombre', '$descripcion', '$fechaCaducidad', '$cantidad', '$lote')";
        $query = $conexion->query($sql);
        if ($query) {
            header("Location: ../gestion_medicamento.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
}

// Cierra la conexión
$conexion->close();
